<?php

require_once('EasyLibs.php');


if (isset( $_GET['list'] )) {
    $_DirRoot = new FS_Directory('./');

    exit(json_encode(
        array_merge(array(), array_map(
            function ($_Path) {
                return  array('URI' => $_Path);
            },
            array_filter($_DirRoot->traverse(),  function ($_Path) {
                return  (pathinfo($_Path, PATHINFO_EXTENSION) == 'php');
            })
        ))
    ));
}


$_Target = new ReflectionClass('EasyAccess');

$_Document = str_replace(
    __DIR__,  '',  ReflectionClass::export('EasyAccess', true)
);
echo  "<pre>$_Document</pre>";