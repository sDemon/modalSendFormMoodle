<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<?php

// All Moodle scripts must have this to initialize the environment.
require('/htdocs/moodle-dl/www/config.php');

// Either the PAGE's context must be set or the context id must be passed to
// the format_string() as the 'context' option so the filter can work.
$PAGE->set_context(context_system::instance());

// Note that the filter expects double quotes wrapping the attributes. Also,
// the following order of attributes is supposed to be a bit faster.

if(!empty($_POST['name']) && !empty($_POST['message'])){

  $name   = $_POST['name'];
  $message= $_POST['message'];

  $to = 'novak.knutd@gmail.com';
  $sub = '<span lang="uk" class="multilang">Зауваження та пропозиції по восконаленню роботи модульного середовища</span><span lang="ru" class="multilang">Замечания и предложения по совершенствованию работы модульного среды образовательного процесса</span><span lang="en" class="multilang">Comments and suggestions to improve the work of the modular environment for educational process</span>';

  $mes = '<span lang="uk" class="multilang">Ім\'я: </span><span lang="ru" class="multilang">Имя: </span><span lang="en" class="multilang">Name: </span>' . $name . "\r\n" . '<span lang="uk" class="multilang">Повідомлення: $message</span><span lang="ru" class="multilang">Сообщение:</span><span lang="en" class="multilang">Message:</span>'. "\r\n" . $message;

  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  if(mail($to,strip_tags(format_text($sub)),format_text($mes),$headers)) {
    $status = '<span lang="uk" class="multilang">Повідомлення відправлено</span><span lang="ru" class="multilang">Сообщение отправлено</span><span lang="en" class="multilang">Message send</span>';
  } else {
    $status = '<span lang="uk" class="multilang">Помилка</span><span lang="ru" class="multilang">Ошибка</span><span lang="en" class="multilang">Error</span>';
  }

  echo format_text($status);die;

} else {
  $fieldErorr = '<span lang="uk" class="multilang">Заповніть всі поля</span><span lang="ru" class="multilang">Заполните все поля</span><span lang="en" class="multilang">Fill all fields</span>';

  echo format_text($fieldErorr);
}
