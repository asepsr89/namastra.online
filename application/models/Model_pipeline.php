<?php

class Model_pipeline extends CI_Model
{
    function getDataPipeline()
    {
        return $this->db->get('pipeline');
    }

    function getDataByCabang($index_data = null)
    {

        $query = "SELECT `id_pipline`,`tgl_input`,`tgl_prospek`,`tl_funding`,`funding_officer`,`nama_prospek`,`alamat`,`nohp`,`pipline`,`estimasi_close`,`closing`,`upload_img`,`id_status`,`NotePC`
        FROM `pipeline`
        WHERE `kode_cabang` = '$index_data'
        ORDER BY `pipeline`.`tgl_input` DESC";

        return $this->db->query($query);
    }

    function simpanpipeline($data)
    {
        $this->db->insert('pipeline', $data);
    }

    function deletePipeline($id_pipline)
    {
        return $this->db->delete('pipeline', array('id_pipline' => $id_pipline));
    }

    public function getByPipeline($id_pipline)
    {
        return $this->db->get_where('pipeline', array('id_pipline' => $id_pipline));
    }

    function updatetpipline($data, $id_pipline)
    {
        $simpan = $this->db->update('pipeline', $data, array('id_pipline' => $id_pipline));
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }
    function updatetapprove($data, $id_pipline)
    {
        $simpan = $this->db->update('pipeline', $data, array('id_pipline' => $id_pipline));
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }

    function statusapprove()
    {
        $query = "SELECT pipeline.id_pipline, status.status, pipeline.funding_officer
        FROM pipeline
        INNER JOIN `status`
        ON pipeline.id_status=status.id_status;";

        return $this->db->query($query);
    }

    function totalClosing($index_data = null)
    {
        $query = " SELECT pipeline.`kode_cabang`,SUM(closing) AS tot_closing
        FROM pipeline
        WHERE kode_cabang ='$index_data'";
        return $this->db->query($query);
    }

    function AdmintotalClosing()
    {

        $this->db->select("SUM(closing) AS tot_closing");
        $this->db->from('pipeline');
        return $this->db->get();
    }

    function totalEstimasi($index_data = null)
    {
        $query = " SELECT pipeline.`kode_cabang`,SUM(estimasi_close) AS tot_estimasi
        FROM pipeline
        WHERE kode_cabang ='$index_data'";
        return $this->db->query($query);
    }
    function AdmintotalEstimasi()
    {
        $this->db->select("SUM(estimasi_close) AS tot_estimasi");
        $this->db->from('pipeline');
        return $this->db->get();
    }
}
