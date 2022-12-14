

Краткое руководство как подключить и использовать классы с примерами
------------------

Примечание: если вы - опытный разработчик, то можете пропустить этот текст
(см. файл "readme-for-advanced.txt" или "README-for-advanced.md")

Если вы хотите использовать наш класс, то предполагается, что:
- у вас уже есть готовый развернутый проект - локально, на хостинге, в облаке итд;
- вы имеете доступ к управлению файлами проекта;
- набрав в строке браузера адрес своего проекта, вы попадете на его главную страницу.

------------------
Начинаем
1. Создайте папку qtsms.class в папке, где лежит первый исполняемый файл PHP (обычно это index.php)

   файл index.php часто располагается не в самом корне проекта, а в папке уровнем ниже - public_html, docs, public и др.
   Это зависит от платформы и настроек веб-сервера

2. Скачайте архив с примерами, распакуйте его в папку qtsms.class
   (в итоге ваш проект должен выглядеть как в разделе "Структура проекта" - см.ниже)
3. Отредактируйте файл test_config.php, указав свои данные: логин, пароль, URI запроса. Сохраните файл
4. Откройте файл index.php и внесите в него следующий код:

    --------пример-кода-начало----------
    <?php

    include $_SERVER['DOCUMENT_ROOT'] . '/qtsms.class/QTSMS.class.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/qtsms.class/test_config.php';

    $sms_text = 'test sms';
    $phone_num = 'xxxxxxxx';

    $iwix_sms_name = 'LogicT';
    $iwix_sms_period = 600;

    $qtsms = new Qtsms($cfg['login'], $cfg['password'], $cfg['host']);
    $result = $qtsms->post_message($sms_text, $phone_num, $phone_num, 'x124127456', $iwix_sms_period);

    header("Content-Type: text/xml; charset=UTF-8");
    echo $result;
    --------пример-кода-конец----------

5. В переменной $phone_num укажите номер телефона, на который хотите отправить тестовую смс.
6. Сохраните файл и перейдите на главную страницу в браузере - будет отправлена смс на указанный номер,
    от сервера должен вернуться ответ в формате xml
7. В файлах test_.php лежат примеры кода для проверки прочей функциональности работы сервиса отправки СМС.
   Вы можете использовать код оттуда, адаптируя его к указанному выше примеру.

------------------
Структура проекта

.
├── index.php - начальный файл, с которого начнется выполнение кода PHP
├── qtsms.class - директория с нашим классом (архив должен быть распакован в нее)
│   ├── QTSMS.class.php - класс-обертка
│   ├── README.md
│   ├── Src
│   │   ├── SmsAction.class.php
│   │   └── ..... остальные классы
│   ├── test1.php
│   ├── test_config.php
│   └── ..... остальные файлы из архива
└── ..... прочие файлы проекта (если есть)


------------------
Структура архива с примерами на PHP

.
├── QTSMS.class.php
├── Src
│   ├── SmsAction.class.php
│   ├── SmsActionBalance.class.php
│   ├── SmsActionBlacklist.class.php
│   ├── SmsActionBlacklistAdd.class.php
│   ├── SmsActionBlacklistDelete.class.php
│   ├── SmsActionInbox.class.php
│   ├── SmsActionInterface.class.php
│   ├── SmsActionPostSms.class.php
│   ├── SmsActionStatus.class.php
│   └── SmsClient.class.php
├── README.md
├── readme.txt
├── test1.php
├── test2.php
├── test3.php
├── test4.php
├── test5.php
├── test_config.php
└── инструкция_с_самого_начала.md

- QTSMS.class.php
    - класс-обертка для работы с интерфейсом, описанным на странице документации на сайте
    - именно этот класс требуется подключить инструкцией include (требуется ВНИМАТЕЛЬНО проверить путь)
    - остальные классы ДОЛЖНЫ располагаться в папке Src, как они и лежат в архиве

- Src/
    - в этой папке находятся классы, выполняющие "под капотом" всю работу по работе с HTTP

- Src/SmsClient.class.php
    - класс-клиент хранит подключение в curl, управляет отправкой запросов, получением ответа

- Src/SmsAction_____.class.php
    - классы активностей, содержат логику и поля запроса
    - отдельный класс для каждого запроса

- test_.php
    - тесты для проверки работоспособности (удобно сделать быструю проверку работоспособности на хостинге)

- test_config.php
    - конфиг с вашими логином, паролем, URI запроса
