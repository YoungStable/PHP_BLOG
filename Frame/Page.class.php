<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Page{
    private $sum;       //总共的记录数
    private $maxnum;    //页面显示的最大页码数
    private $pageSize;  //每页显示的记录数
    private $url;       //固定的url
    
    public function __construct($sum,$maxnum,$pageSize,$url) {
        $this->sum = $sum;
        $this->maxnum = $maxnum;
        $this->pageSize = $pageSize;
        $this->url = $url;
    }

    public function str_pages() {
        $pageNo = isset($_GET['pageNo']) ? $_GET['pageNo'] : 1;
        $pageTotal = ceil($this->sum / $this->pageSize);

        $pageStr = '';
        $pageStr .= "<a href='{$this->url}pageNo=1'>首页</a> &nbsp";
        $preNo = $pageNo == 1 ? 1 : $pageNo - 1;
        $pageStr .= "<a href='{$this->url}pageNo=$preNo'><<上一页</a>&nbsp";

        if ($pageNo <= 3)
            $startNo = 1;
        else
            $startNo = $pageNo - 2;
        if ($startNo > $pageTotal - $this->maxnum + 1)
            $startNo = $pageTotal - $this->maxnum + 1;
        $endNo = $startNo + $this->maxnum - 1;
        if ($endNo > $pageTotal)
            $endNo = $pageTotal;
        if ($startNo < 1)
            $startNo = 1;

        for ($i = $startNo; $i <= $endNo; $i++)
            if ($i == $pageNo)
                $pageStr .= "<a href='{$this->url}pageNo=$i'><font color='red'>$i</font></a>&nbsp";
            else
                $pageStr .= "<a href='{$this->url}pageNo=$i'>$i</a>&nbsp";

        $nextNo = $pageNo == $pageTotal ? $pageTotal : $pageNo + 1;
        $pageStr .= "<a href='{$this->url}pageNo=$nextNo'>下一页>></a>&nbsp";
        $pageStr .= "<a href='{$this->url}pageNo=$pageTotal'>尾页</a>&nbsp";
        
        $pageStr .= "|总页数:$pageTotal";

        return $pageStr;
    }

}
