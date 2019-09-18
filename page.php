<?php
    function siteinfo(){
        $url = 'siteinfo.json';
        $data = file_get_contents($url);
        $pages = json_decode($data, true);
        return $pages;
    }
    function dochead($pgname){
        $url = 'siteinfo.json';
        $data = file_get_contents($url);
        $pages = json_decode($data, true);
        //getting information from page json file
        echo"<!DOCTYPE html>
        <html lang=\"en\">
        <head>
            <meta charset=\"UTF-8\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
            <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
            ";
        // echo"<link rel=\"shortcut icon\" href=\"stylesAndJs/favicons/$favicon.ico\" type=\"image/x-icon\">";
        $title = $pages[$pgname]['title'];
        $cssl = $pages[$pgname]['css'];
        for($i = 0;$i < count($cssl);$i++){
            echo"<link rel=\"stylesheet\" href=\"$cssl[$i]\">";
        }
        echo"<title>$title</title>
        </head>
        <body>
        ";
    }
    function doctail($pgname){
        $url = 'siteinfo.json';
        $data = file_get_contents($url);
        $pages = json_decode($data, true);
        echo"</body>";
        $sjs = 0;
        $jsl = $pages[$pgname]['js'];
        for($i = 0;$i < count($jsl);$i++){
            if(preg_match("/Ajax/",$jsl[$i]) AND $sjs != 1){
                $sjs = 1;
            }
            echo"<script src='".$jsl[$i]."'></script>";
        }
        if(isset($_GET['f'])){
            if($subs = $pages[$pgname]['subsJs']){
                $subpage = $_GET['page'];
                $script = $subs[$subpage];
                echo"<script src='../".$script."'></script>";
            }
        }
        echo"</html>";
    }
    //include master adv from database
    function mastAdv($nullornot=null){
        if ($nullornot == null) {
            //do nothing
        }elseif ($nullornot == 'YES'){
            echo "mastadv<br>";
        }
    }
    function nav($base,$nav){//STICKY position
        //include nav from views and pass page name with its address
        if($nav=="yes"){
            echo "<script>console.log('base: $base')</script>";
            include(env('DIR_GRD') . $base . "nav.php");
        }else{

        }
    }
    function breadcrumb($viewnamewithAddress){//not designed yet

    }
    function mainView($viewnamewithAddress,$pgno=null){        //ACTUAL PAGE.
        echo"<main>";
        $viewnamewithAddress = env('DIR_GRD').$viewnamewithAddress;
        //include page
        include($viewnamewithAddress);
        //include pagination
        include(env('DIR_GRD')."/views/.PAGE_BLOCKS/pagination.php");
        if($pgno != null){
            pagination($viewnamewithAddress);
        }
        echo"</main>";
    }
    //include footer
    function footer($nullornot=null){//DEFAULT

    }
    //GENERATE PAGE RESULTS 
    //THIS IS THE PAGE COMPOSER FUNCTION template implementation FUNC
    function view($route,$mth){
        $pages = siteinfo();
        if($pages[$route]["method"] == $mth){
            $base = $pages[$route]["base"];
            $viewnamewithAddress = $pages[$route]["view"];
            $nav = $pages[$route]["nav"];
            $madv = $pages[$route]["madv"];
            $pgno = $pages[$route]["pgno"];
            $foot = $pages[$route]["foot"];
            dochead($route);
            mastAdv($madv);
            nav($base,$nav);
            mainView($viewnamewithAddress,$pgno);
            footer($foot);
            doctail($route);
        }else{
            echo "PAGE NOT FOUND";
        }
    }
?>