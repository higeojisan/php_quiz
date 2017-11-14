<?php
require_once('vendor/autoload.php');

quiz_start();

function quiz_start()
{
   // ジャンルの選択
   echo "クイズのジャンルを指定してください" . PHP_EOL;
   echo "【" . \My\Quiz\QuizFactory::MATH . "】数学" . PHP_EOL;
   echo "【" . \My\Quiz\QuizFactory::ENGLISH . "】英語" . PHP_EOL;
   echo "【" . \My\Quiz\QuizFactory::SOCCER . "】サッカー" . PHP_EOL;
   while (true) {
      // 入力値のチェック
      $genre = (int)trim(fgets(STDIN));
      if ($genre === \My\Quiz\QuizFactory::MATH || $genre === \My\Quiz\QuizFactory::ENGLISH || $genre === \My\Quiz\QuizFactory::SOCCER) {
         break;
      } else {
         echo "1～3の半角数字で入力してください。" . PHP_EOL;
      }
   }

   // クイズの方式の選択
   echo "クイズの方式を指定してください". PHP_EOL;
   if ($genre == \My\Quiz\QuizFactory::MATH || $genre == \My\Quiz\QuizFactory::ENGLISH) {
      echo "【" . \My\Quiz\QuizFactory::TWOOPTIONS . "】2択" . PHP_EOL;
      echo "【" . \My\Quiz\QuizFactory::THREEOPTIONS . "】3択" . PHP_EOL;
   } elseif ($genre == \My\Quiz\QuizFactory::SOCCER) {
      echo "【" . \My\Quiz\QuizFactory::FILLINTHEBLANK . "】穴埋め" . PHP_EOL;
   }
   while (true) {
      // 入力値のチェック
      $option = (int)trim(fgets(STDIN));
      if ($genre === \My\Quiz\QuizFactory::MATH || $genre === \My\Quiz\QuizFactory::ENGLISH) {
         if ($option === \My\Quiz\QuizFactory::TWOOPTIONS || $option == \My\Quiz\QuizFactory::THREEOPTIONS) {
            break;
         } else {
            echo "1もしくは2を半角数字で入力してください" . PHP_EOL;
         }
      } elseif ($genre === \My\Quiz\QuizFactory::SOCCER) {
         if ($option === \My\Quiz\QuizFactory::FILLINTHEBLANK) {
            break;
         } else {
            echo "3を半角数字で入力してください" . PHP_EOL;
         }
      }
   }

   // クイズオブジェクトの生成
   $quizzes = \My\Quiz\QuizFactory::create($genre, $option);

   // クイズの開始
   $correct_num = 0;
   for ($i = 0; $i < $quizzes::NUMBERS_OF_QUIZZES; $i++) {
      // 問題の表示
      $current_quiz_num = $i + 1;
      echo "Question. $current_quiz_num" . PHP_EOL;
      $quizzes->displayQuiz($i);

      // 選択肢の表示
      $quizzes->displayChoice($i);

      // 回答の入力の受付&入力値のチェック
      while (true) {
         $user_answer = trim(fgets(STDIN));
         if ($quizzes->inputCheck($user_answer)) {
            break;
         }
      }

      // 答え合わせ
      if ($quizzes->isCorrect($user_answer, $i)) {
         $correct_num++;
         echo  "正解！！" . PHP_EOL;
      } else {
         echo "不正解！！" . PHP_EOL;
      }

      // 画面のクリア
      sleep(2);
      echo "\033[;H\033[2J";

      // 最終問題なら採点結果を表示
      if ($i === $quizzes::NUMBERS_OF_QUIZZES - 1) {
         echo "=========採点結果==========" . PHP_EOL;
         echo $quizzes::NUMBERS_OF_QUIZZES . "問中" . $correct_num . "問正解" . PHP_EOL;
         // 続けるか聞く
         echo "続けますか？" . PHP_EOL;
         echo "【1】続ける" . PHP_EOL;
         echo "【2】やめる" . PHP_EOL;
         $continue = trim(fgets(STDIN));
         if ($continue == 1) {
            echo "\033[;H\033[2J";
            quiz_start();
         } else {
            exit;
         }
      }
   }
}

