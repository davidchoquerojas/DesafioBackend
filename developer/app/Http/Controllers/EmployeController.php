<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Response;

class EmployeController extends Controller
{
    //
    private $sFileName = "employes.json";
    
    /**
     * Retorna el filtrado de salario desde min a max
     * @param int $min
     * @param int $max
     * @return \Illuminate\Http\Response
     */
    public function listEmploye(){
        $path = public_path() . "/db/".$this->sFileName;
        if (!File::exists($path)) {
            throw new Exception("Invalid File");
        }
        $file = File::get($path);
        return response()->json(json_decode($file), 200);
    }

    /**
     * Retorna el filtrado de salario desde min a max
     * @param int $min
     * @param int $max
     * @return \Illuminate\Http\Response
     */
    public function listEmployeMinMaxJSON($min,$max){
        $filtered = $this->employeFilter($min,$max);;
        if ($min && $max) {
            foreach ($filtered as $employee) {
                $salary = str_replace(',', '', $employee['salary']);
                $salary = str_replace('$', '', $salary);
                $salary = floatval($salary);
                if ($min <= $salary && $salary <= $max) {
                    $filtered[] = $employee;
                }
            }
        } else $filtered = $all;
        return response()->json($filtered, 200);
    }
    /**
     * Retorna el filtrado de salario desde min a max
     * @param int $min
     * @param int $max
     * @return \Illuminate\Http\Response
     */
    public function listEmployeMinMaxXML($min,$max){
        
        $filtered = $this->employeFilter($min,$max);
        $xml = new \SimpleXMLElement('<root/>');
        foreach ($filtered as $employee) {
            $item = $xml->addChild('employee');
            $skills = $employee['skills'];
            unset($employee['skills']);
            array_walk_recursive($employee, function($value, $key) use ($item) {
                $item->addChild($key, $value);
            });
            $skills_node = $item->addChild('skills');
            array_walk_recursive($skills, function($value, $key) use ($skills_node) {
                $skills_node->addChild($key, $value);
            });				
        }
        return Response::make($xml->asXML(), '200')->header('Content-Type', 'text/xml');
    }

    /**
     * Retorna el filtrado de salario desde min a max
     * @param int $min
     * @param int $max
     * @return array $filtered
     */
    private function employeFilter($min,$max){
        $path = public_path() . "/db/".$this->sFileName;
        if (!File::exists($path)) {
            throw new Exception("Invalid File");
        }
        $file = File::get($path);
        $listEmploye = json_decode($file, true);
        $filtered = [];
        if ($min && $max) {
            foreach ($listEmploye as $employee) {
                $salary = str_replace(',', '', $employee['salary']);
                $salary = str_replace('$', '', $salary);
                $salary = floatval($salary);
                if ($min <= $salary && $salary <= $max) {
                    $filtered[] = $employee;
                }
            }
        } else $filtered = $listEmploye;
        return $filtered;
    }
}
