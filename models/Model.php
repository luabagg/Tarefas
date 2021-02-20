<?php

interface Model
{

    public function selectAll();

    public function selectOne($id);

    public function insert($vo);

    public function update($vo);

    public function delete($id);
}
