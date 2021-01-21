<?php
    require_once(__ROOT__ . '/base/IDbApi.php');
    class BsDbWrapper extends IDbWrapper {
        function getJobs() {
            $res = $this->getConnection()->query('select * from job');
            return $res;
        }
    
        function doPersonSearch($searchStr, $jobs) {
            $baseQuery = 'select * from person natural join job natural join person_lehrberuf natural join bs where INSTR(pe_nname, ?)';
            if(sizeof($jobs) > 0) {
                $questionmarks = str_replace(' ', ', ', trim(implode(' ', str_split(str_repeat('?', sizeof($jobs))))));
                $baseQuery .= " and job_id in($questionmarks)";
                return $this->getConnection()->query($baseQuery, array_merge([$searchStr], $jobs));
            }
            return $this->getConnection()->query($baseQuery, $searchStr);
        }
    
        function personExists($vorname, $nachname) {
            $personFetch = $this->getConnection()->query('
                select * from person where pe_vname = ? and pe_nname = ?
            ', [$vorname, $nachname]);
            $len = sizeof($personFetch);
            return sizeof($personFetch) > 0;
        }
    
        function addNewPerson($vorname, $nachname, $jobId, $bs_id, $lb_id) {
            $this->getConnection()->query('
                insert into person(pe_vname, pe_nname, job_id) values(?, ?, ?)
            ', [$vorname, $nachname, $jobId]);
    
            $pe_id = $this->getConnection()->lastInsertId();
            $this->getConnection()->query('
                insert into person_lehrberuf(pe_id, bs_id, lb_id, pele_von, pele_bis) values(?, ?, ?, ?, ?)
            ', [$pe_id, $bs_id, $lb_id, date('Y-m-d'), date('Y-m-d', strtotime('+4 years'))]);
            $err = $this->getConnection()->getError();
        }
    
        function getSchulen($ignoreEmpty = false) {
            if($ignoreEmpty) {
                return $this->getConnection()->query('select bs_id,
                                                   CONCAT(bs_zusatz, \' \', bs_ort) as "bs_name",
                                                   bs_ort,
                                                   bs_zusatz as "bs_bezeichnung"
                                              from bs b
                                             where exists(select 1 from bs_lehrberuf bl where b.bs_id = bl.bs_id)
                                             order by bs_ort, bs_zusatz');
            } else {
                return $this->getConnection()->query('select bs_id,
                                                   CONCAT(bs_zusatz, \' \', bs_ort) as "bs_name",
                                                   bs_ort,
                                                   bs_zusatz as "bs_bezeichnung"
                                              from bs order by bs_ort, bs_zusatz');
            }
        }
    
        function getLehrberufeBySchule($bs_id) {
            $res = $this->getConnection()->query('select * from bs_lehrberuf natural join lehrberuf where bs_id = ?', [$bs_id]);
            return $res;
        }
    }
