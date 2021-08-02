<html lang="en">
<head>
    <title>Evgeny Ilin's personal page and CV</title>
    <meta charset="utf-8">
    <meta name="yandex-verification" content="87086c37a62d6364" />
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Roboto&family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
<style>
    /*
    font-family: 'Lato', sans-serif;
    font-family: 'Roboto', sans-serif;
    font-family: 'Roboto Condensed', sans-serif;
     */
    *{
        margin: 0;
        padding: 0;
    }
    .main {
        /*font-family: 'Courier New', sans-serif;*/
        font-family: 'Roboto Condensed', sans-serif;
    }
    .wrapper
    {
        width: 50%;
        margin: 0 auto;
    }
    .photo {
        padding-top: 2vh;
    }
    .photo img {
        width: 20%;
    }
    h4 {
        margin-top: 1.5em;
    }
    .resume-title {
        font-weight: 600;
        margin-left: 1em;
    }
    .resume-description {
        margin-left: 2em;
    }

    @media (min-width: 948px) and (max-width: 1280px) {

    }
    @media (min-width: 783px) and (max-width: 947px) {

    }
    @media (min-width: 481px) and (max-width: 782px) {

    }
    @media (min-width: 100px) and (max-width: 480px) {
        .wrapper {
            width: 95%;
         }
        .photo img {
            width: 55%;
        }
    }
</style>
<div class="wrapper">
    <div class="photo">
        <img src="img/me.jpg">
    </div>
    <div>Professional prevails</div><br>
    <div class="contacts">
        <span>contact me:</span><br>
        <a target="_blank" href="https://t.me/EvgenyIlin">@EvgenyIlin</a>
        <!--@todo: hide contact from spam-bots --><br>
        <a href="mailto:evgeny@ilin.me">evgeny@ilin.me</a>
    </div>
    <div class="main" id="main">

Bolid R&D 2019 -->
    Skills
        UX/UI:
            -- Mockuplus Classic
        Software:
            -- C++, Qt, Boost, Postgresql, MSSQL
        CI/CD:
            -- Git, Cmake, Qmake, MsBuild, Teamcity, Travis CI, Bintray, Squish, Squish Test Center, Jira Software + Zephyr, NSIS

    Experience & Achievements
        UX/UI:
            -- Прототипирование кроссплатформенного десктоп-приложения
            -- Внедрение внутри компании стандартов UX для работы с данными
        Software:
            -- Обучение новому языку и его окружению. Успешный онбоардинг в течение полугода.
            -- Реализация кроссплатформенного приложения конфигурируемого редактора БД
            -- Реализация кроссплатформенного прикладного приложения для АРМ "Орион Х"
        CI/CD:
            -- Внедрение сервера сборки на базе Teamcity
            -- Внедрение автоматизации тестирования графических приложений (Qt based) на базе Squish
            -- Внедрение практики выпуска приложения как целостного продукта

LEXPRO Ltd  2011 — 2019
    Skills
        Web Development:
            HTML5/CSS3, NodeJS, PHP, Phalcon, CakePHP, Sphinx, XSLT, WebDesign/UX
        DevOps:
            OpenVZ, Docker, Zabbix
        CI/CD:
            Composer, Git, Selenium, Jenkins
        Техническое руководство проектами "Телемедицина", "Цифровая ферма":
            Постановка и контроль выполнения задач по проектам. Взаимодействие со стейкхолдерами. Взаимодействие с гос. органами.

    Experience & Achievements
        Web Development:
            -- рефакторинг поиска юридической справочной системы
            -- улучшение качества поиска
        DevOps:
            -- внедрение принципов контейнеризации на базе OpenVZ, внедрение микросервисности
            -- улучшение процесса обновления системы
            -- организация мониторинга сервисов проекта
        CI/CD:
            -- внедрение принципов CI/CD, платформа Jenkins. Внедрение автоматизации тестирования веб-части проекта, платформа Selenium. Разработка тестов.
        Руководство проектом:
            -- внедрение Agile в процесс разработки, использование Kanban

Start career in 2007.

    </div>
</div>
</body>
</html>
<script>
    let main_cv = document.querySelector('.main');
    let headers = main_cv.innerHTML.match(new RegExp("^\\w.*", "gm"));
    //console.log(headers)
    headers.forEach((header) => {
        main_cv.innerHTML = main_cv.innerHTML.replace(header, `<h4>${header}</h4>`);
    })

    main_cv.innerHTML = main_cv.innerHTML.replace(/Skills|Experience.*/gm, function (match){
        return `<b>${match}</b>`;
    });
    //main_cv.innerHTML = main_cv.innerHTML.replace(new RegExp("\\n", "g"), "<br>");
     main_cv.innerHTML = main_cv.innerHTML.replace(/^\s+--.+/gm, function (match){
         return `<div class="resume-description">${match}</div>`;
     });
    main_cv.innerHTML = main_cv.innerHTML.replace(/^\s.+:/gm, function (match){
        return `<div class="resume-title">${match}</div>`;
    });
    //main_cv.innerHTML = main_cv.innerHTML.replace(new RegExp("\\s", "g"), "&nbsp");
</script>
