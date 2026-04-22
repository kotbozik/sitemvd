<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Электронная информационно-образовательная среда УрЮИ МВД России</title>
    <link rel="stylesheet" href="css/style.css">
    
    <!-- BVI плагин CSS -->
    <link rel="stylesheet" href="bvi.min.css" type="text/css">
</head>
<body>
    <header class="header">
        <div class="header-content">
            <img src="images/footer-apeks.png" alt="Герб УрЮИ МВД" class="header-logo">
            <h1 class="site-title">Электронная информационно-образовательная среда УрЮИ МВД России</h1>
            <!-- Верхние кнопки: перевод + очки (привязаны к шапке) -->
            <div class="a11y-toolbar" aria-label="Accessibility toolbar">
                <button type="button" class="a11y-icon-button" data-action="open-lang-modal" aria-label="Перевод" title="Предать родину">
                    <img src="images/interface-text-formatting-translate--options-text-translate--Streamline-Core.svg" alt="Перевод">
                </button>
                <a href="#" class="bvi-open" style="width: 46px; height: 46px; border-radius: 50%; border: none; cursor: pointer; padding: 0; 
                background: rgba(255, 255, 255, 0.95); box-shadow: 0 10px 24px rgba(0, 0, 0, 0.25); display: flex; align-items: center; 
                justify-content: center;" title="Ты чо слепой?">
                <img src="images/Group.svg" style="width: 40px;height: 40px; 
                    margin-top: 5px;
                    margin-left: 3px; ">
            </a>
            </div>
            <a href="https://eios-ural-mvd.ru/login/index.php" class="content-link1">Войти</a>            
        </div>
    </header>

    <!-- Окно выбора языка -->
    <div id="lang-modal" class="modal-overlay is-hidden" aria-hidden="true">
        <div class="lang-modal" role="dialog" aria-modal="true" aria-labelledby="lang-modal-title">
            <div id="lang-modal-title" class="lang-modal__title">Выберите язык</div>
            <div class="lang-modal__buttons">
                <button type="button" class="lang-btn" data-lang="ru">Русский</button>
                <button type="button" class="lang-btn" data-lang="en">English</button>
            </div>
        </div>
    </div>

    <!-- Панель версии для слабовидящих -->
    <section id="a11y-panel" class="a11y-panel is-hidden" aria-label="Панель версии сайта">
        <div class="a11y-panel__inner">
            <div class="a11y-panel__group">
                <span class="a11y-panel__label" id="selected-lang-label">Русский</span>
            </div>

            <div class="a11y-panel__group">
                <span class="a11y-panel__label">Размер:</span>
                <button type="button" class="a11y-text-btn" data-font-size="18" aria-label="Уменьшить размер">A</button>
                <input id="font-size-range" class="a11y-range" type="range" min="16" max="24" step="1" value="18" aria-label="Размер текста">
                <button type="button" class="a11y-text-btn a11y-text-btn--large" data-font-size="24" aria-label="Увеличить размер">A</button>
            </div>

            <div class="a11y-panel__group">
                <span class="a11y-panel__label">Цвет:</span>
                <button type="button" class="a11y-color-btn a11y-color-btn--light" data-theme="light" aria-label="Светлая схема"></button>
                <button type="button" class="a11y-color-btn a11y-color-btn--dark" data-theme="dark" aria-label="Темная схема"></button>
                <button type="button" class="a11y-color-btn a11y-color-btn--blue" data-theme="blue" aria-label="Синяя схема"></button>
            </div>

            <div class="a11y-panel__group">
                <span class="a11y-panel__label">Изображения:</span>
                <label class="a11y-radio">
                    <input type="radio" name="a11y-images" value="on" checked>
                    <span>Вкл.</span>
                </label>
                <label class="a11y-radio">
                    <input type="radio" name="a11y-images" value="off">
                    <span>Выкл.</span>
                </label>
            </div>

            <div class="a11y-panel__group">
                <span class="a11y-panel__label">Кернинг:</span>
                <button type="button" class="a11y-kern-btn" data-letter-spacing="0">АТ</button>
                <button type="button" class="a11y-kern-btn" data-letter-spacing="0.06em">АТ</button>
                <button type="button" class="a11y-kern-btn" data-letter-spacing="0.12em">АТ</button>
            </div>

            <button type="button" class="a11y-panel__close" data-action="close-a11y-view" aria-label="Закрыть">×</button>
        </div>
    </section>

    <nav class="main-nav">
        <div class="nav-item active" data-column="col-forms">
            <img src="images/nav-forms.svg" alt="Icon" class="nav-icon">
            <span class="nav-text">Виды и формы обучения</span>
        </div>
        <div class="nav-item" data-column="col-resources">
            <img src="images/nav-resources.svg" alt="Icon" class="nav-icon">
            <span class="nav-text">Образовательные компоненты и ресурсы</span>
        </div>
        <div class="nav-item" data-column="col-directions">
            <img src="images/nav-directions.svg" alt="Icon" class="nav-icon">
            <span class="nav-text">Направления подготовки</span>
        </div>
        <div class="nav-item" data-column="col-quality">
            <img src="images/nav-quality.svg" alt="Icon" class="nav-icon">
            <span class="nav-text">Качество образования</span>
        </div>
        <div class="nav-item" data-column="col-services">
            <img src="images/nav-services.svg" alt="Icon" class="nav-icon">
            <span class="nav-text">Пользовательские сервисы</span>
        </div>
    </nav>

    <main class="main-content">
        <div class="columns-wrapper">
            <div class="column col-forms active">
                <a href="https://eios-ural-mvd.ru/course/index.php?categoryid=2" class="content-link">Очная форма обучения</a>
                <a href="http://212.49.112.158/moodle/course/index.php?categoryid=3" class="content-link">Заочная форма обучения</a>
                <a href="http://212.49.112.158/moodle/course/index.php?categoryid=2" class="content-link">СДОТ</a>
                <a href="http://212.49.112.158/moodle/login/index.php" class="content-link">Повышение квалификации</a>
                <a href="http://212.49.112.158/moodle/course/index.php?categoryid=678" class="content-link">Адъюнктура</a>
                <a href="http://212.49.112.158/moodle/login/index.php" class="content-link">Профессиональное обучение</a>
            </div>

            <div class="column col-resources">
                <a href="http://212.49.112.158/moodle/course/index.php?categoryid=2344" class="content-link">Основные профессиональные образовательные программы</a>
                <a href="https://eios-ural-mvd.ru/moodle/course/index.php?categoryid=11" class="content-link">Электронные информационные ресурсы</a>
                <a href="https://eios-ural-mvd.ru/moodle/course/index.php?categoryid=12" class="content-link">Электронные образовательные ресурсы</a>
                <a href="http://212.49.112.158/moodle/course/index.php?categoryid=2366" class="content-link">Модуль сетевого взаимодействия лингвистических кафедр образовательных организаций МВД России</a>
            </div>

            <div class="column col-directions">
                <a href="http://212.49.112.158/moodle/course/index.php?categoryid=10" class="content-link">Подготовка иностранных специалистов к освоению образовательных программ на русском языке в образовательных организациях МВД России</a>
                <a href="http://212.49.112.158/moodle/course/index.php?categoryid=2006" class="content-link">Морально-психологическая подготовка</a>
                <a href="http://212.49.112.158/moodle/course/index.php?categoryid=1970" class="content-link">Профессиональная служебная и физическая подготовка</a>
            </div>

            <div class="column col-quality">
                <a href="http://212.49.112.158/moodle/course/index.php?categoryid=2251" class="content-link">Оценка качества образовательной деятельности</a>
            </div>

            <div class="column col-services">
                <a href="https://eios-ural-mvd.ru/moodle/my" class="content-link">Личный кабинет преподавателя</a>
                <a href="https://eios-ural-mvd.ru/moodle/my" class="content-link">Личный кабинет обучающегося</a>
            </div>
        </div>

        <div class="background-emblem">
            <img src="images/emblem-bg.svg" alt="Background" class="bg-img">
        </div>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <img src="images/mvd-emblem.svg" alt="Герб МВД" class="footer-emblem">
            <a href="https://apeks-vuz.ru" class="footer-link" target="_blank">
                <img src="images/logo.png" alt="Апекс-вуз" class="footer-img">
                <span>Апекс-вуз</span>
            </a>
            <a href="https://bigbluebutton.org" class="footer-link" target="_blank">
                <img src="images/footer-bbb.png" alt="BigBlueButton" class="footer-img">
                <span>Сервер ВКС УрЮИ МВД России</span>
            </a>
            <a href="https://irbis64.ru" class="footer-link" target="_blank">
                <img src="images/footer-irbis.png" alt="ИРБИС" class="footer-img">
                <span>Электронная библиотечная система ИРБИС</span>
            </a>
        </div>
    </footer>

    <!-- Ваши существующие скрипты -->
    <script src="js/config.js"></script>
    <script src="js/main.js"></script>
    
    <!-- BVI плагин JS -->
    <script src="bvi.min.js"></script>
    <script>
        // Инициализация BVI плагина с настройками
        new isvek.Bvi({
            target: '.bvi-open',     // класс кнопки вызова
            fontSize: 18,            // базовый размер шрифта
            theme: 'white',          // светлая тема (white, black, blue, brown, green)
            fontFamily: 'arial',     // шрифт
            letterSpacing: 'normal', // межбуквенный интервал
            lineHeight: 'normal',    // межстрочный интервал
            images: true,            // показывать изображения
            reload: true,            // перезагружать страницу при выходе из режима
            speech: true,            // включить синтез речи
            builtElements: true,     // встроенные элементы
            panelFixed: true,        // фиксированная панель вверху
            panelHide: false,        // не скрывать панель
            lang: 'ru-RU'            // русский язык
        });
    </script>
</body>
</html>