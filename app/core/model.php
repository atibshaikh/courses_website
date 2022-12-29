<?php
/**
 * Main Model Class
 */


class Model extends Database
{   
        
        protected $table = "";

        public function insert($data){

            //remove unwanted column
            if(!empty($this->allowedColumns)){

                foreach($data as $key => $value){
                    if(!in_array($key, $this->allowedColumns)){

                        unset($data[$key]);
                    }
                }
            }

            $keys = array_keys($data);
            $values = array_values($data);


            show($keys);

            $query  = "insert into ". $this->table;

            //The implode() function returns a string from the elements of an array.

            $query .= "(".implode(",", $keys). ") values (:".implode(",:", $keys). ")";
            
            //pdo execute huve tab $data me name proper predefine hona chahiye

            // print_r($data);
            // print_r($values);

            $this->query($query, $data);


        }



        public function where($data){

            $keys = array_keys($data);

            $query = "SELECT * from ".$this->table. " where ";
            
            foreach ($keys as $key ) {
                
                $query .= $key . "=:" . $key . "&& ";
            }

            //agar trim nahi karte heto query me last me && reh jayega
            $query = trim($query, "&& ");
            //echo $query;
            
            $res = $this->query($query, $data);

            if(is_array($res)){

                return $res;
            }

            return false;

        }

        public function first($data){

            $keys = array_keys($data);

            $query = "SELECT * from ".$this->table. " where ";
            
            foreach ($keys as $key ) {
                
                $query .= $key . "=:" . $key . "&& ";
            }

            //agar trim nahi karte heto query me last me && reh jayega
            $query = trim($query, "&& ");
            $query .= " order by id desc limit 1";
            
            $res = $this->query($query, $data);

            if(is_array($res)){

                return $res[0];
            }

            return false;

        }
}