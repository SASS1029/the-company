<?php

session_start();
session_unset();
session_destroy();

header("location: ../views/");
exit; //スクリプトの処理を終了　　　　　　//下に何も続かないならphpは閉めなくていい