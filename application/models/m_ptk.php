<?php
class M_Ptk extends CI_Model(){
		public function DataPTKA($dt){
        $columns = implode(', ', $dt['col-display']) . ', ' . $dt['id-table'];
        $sql  = "SELECT * FROM {$dt['table']}";
        $data = $this->db->query($sql);
        $rowCount = $data->num_rows();
        $data->free_result();
        $columnd = $dt['col-display'];
        $count_c = count($columnd);
        $search = $dt['search']['value'];
		$where = '';
        if ($search != '') {   
            for ($i=0; $i < $count_c ; $i++) {
                $where .= $columnd[$i] .' LIKE "%'. $search .'%"';
                
                if ($i < $count_c - 1) {
                    $where .= ' OR ';
                }
            }
        }
        for ($i=0; $i < $count_c; $i++) { 
            $searchCol = $dt['columns'][$i]['search']['value'];
            if ($searchCol != '') {
                $where = $columnd[$i] . ' LIKE "%' . $searchCol . '%" ';
                break;
            }
        }
        if ($where != '') {
            $sql .= " WHERE " . $where;
            
        }
        
        $sql .= " ORDER BY {$columnd[$dt['order'][0]['column']]} {$dt['order'][0]['dir']}";
        $start  = $dt['start'];
        $length = $dt['length'];
        $sql .= " LIMIT {$start}, {$length}";
        
        $list = $this->db->query($sql);
        $option['draw']            = $dt['draw'];
        $option['recordsTotal']    = $rowCount;
        $option['recordsFiltered'] = $rowCount;
        $option['data']            = array();
        foreach ($list->result() as $row) {
         	$rows = array();
           for ($i=0; $i < $count_c; $i++) { 
               $rows[] = $row->$columnd[$i];
           }
           $option['data'][] = $rows;
        }
        echo json_encode($option);
    }
}
