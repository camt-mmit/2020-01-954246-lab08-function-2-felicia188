<?php
/*
602110188
chen shuo */
//php hw8-1.php ass-01-input.txt

$fp = fopen($_SERVER['argv'][1], 'r');// 学生成绩文件$fp 

    fscanf($fp, "%d", $n);//文档中有几行，进行文档内容读取
    $students = [];//数组$students，将学生名字和分数放入数组
    for($i = 0; $i < $n; $i++) {//读取文档
        $student = [];//$student为空数组
        fscanf($fp, "%s %s %f", $student['name'],$student['number'], $student['score']);//数组$student，子数组name和score
        $students[] = $student;
    }

    fclose($fp);//关闭文件

    function cmp($a, $b)
{
    return strcmp($b["score"], $a["score"]);
}
$printStudent = function($student) {
    printf("%6s %6s: %6.2f\n", $student['name'], $student['number'], $student['score']);
};
usort($students, "cmp");
while (list($key, $value) = each($students)) {    
}
array_walk( $students ,$printStudent)  ;
echo "\n";



