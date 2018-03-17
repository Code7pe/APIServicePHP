<?php

/* 
 * Copyright 2018 tacuchi.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

abstract class Connection{
    
    var $link;
    
    protected function getConnection(){
        
        if(!isset($link)){
            $link = mysqli_connect("localhost","code7user","password","code7db") or die ('CODE7: Error al conectar a la BD');
        }
    
        return $link;
    }
    
    protected function begin(){
        mysqli_begin_transaction();
    }

    protected function commit(){
        mysqli_commit($link);
    }

    protected function rollback(){
        mysqli_rollback($link);
    }
    
    protected function TraerUno($sql){
        //Retorna Array de Array Asociativo de la consulta
        $cursor = mysqli_query($this->getConnection(), $sql);
        $datos = mysqli_fetch_array($cursor, MYSQLI_ASSOC);
        $array = [];
        foreach ($datos as $key => $value) {
            $array[$key] = $value;
        }
        
        mysqli_free_result($cursor);
        return $array;
    }
    
    protected function TraerTodos($sql){
        //Retorna Array de Array Asociativo de la consulta
        $cursor = mysqli_query($this->getConnection(), $sql);
        $datos = mysqli_fetch_all($cursor, MYSQLI_ASSOC);
        $array = [];
        foreach ($datos as $key => $value) {
            $array[$key] = $value;
        }
        
        mysqli_free_result($cursor);
        return $array;
    }
    
    protected function EjecutarTransaccion($sql){
        $success = true;
        $result = mysqli_query($this->getConnection(), $sql);
        if (!$result){
            $success = false;
        }        
        mysqli_free_result($result);
        return $success;
    }
}