<?php
/*
602110188
chen shuo */
//php hw8-2.php ass-02-input-01.txt & ass-02-input-02.txt
$fp = fopen($_SERVER['argv'][1], 'r');// 学生成绩文件$fp 

    fscanf($fp, "%d", $n);//文档中有几行，进行文档内容读取
    $students = [];//数组$students，将学生名字和分数放入数组
    for($i = 0; $i < $n; $i++) {//读取文档
        $student = [];//$student为空数组
        fscanf($fp, "%s %s %f %f", $student['name'],$student['number'], $student['score1'], $student['score2']);//数组$student，子数组name和score
        $students[] = $student;
    }
    fclose($fp);//关闭文件

$avg = array_reduce($students, function($carry, $student) {//array_reduce 连加
    return $carry + $student['score1']+$student['score2'];
    }, 0) / count($students);//平均值计算

$passes = array_filter($students, function($student) use ($avg) {//array_filter对数组中的元素进行逻辑判断
     return $student['score1']+$student['score2'] >= $avg;
    });

$summ = array_reduce($passes, function($carry, $student) {//array_reduce 连加
    return $carry + ($student['score1']+$student['score2']);
}, 0) ;
    
    
    //计算总值

$printStudent = function($student) {
    printf("%6s %6s : %6.2f %6.2f = %6.2f \n", $student['name'],$student['number'], $student['score1'], $student['score2'],$student['score1']+$student['score2']);
    };


array_walk($students, $printStudent);

printf("Average total score : %8.2f.\n", $avg);

printf("Summation of total score greater than or equal %6.2f : %6.2f \n", $avg, $summ);
