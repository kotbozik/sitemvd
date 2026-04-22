<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Уральский юридический институт МВД России | Вход в систему</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="login-container">
    <div class="hero-bar">
    <div class="institute-emblem">
            <div class="shield-icon">
                <img src="images/footer-apek.png" alt="Герб УрЮИ МВД" class="header-logo">
            </div>
        </div>
        <h1>Уральский юридический институт<br>МВД России</h1>
        <div class="sub">Авторизованная система доступа</div>
    </div>

    <div class="form-section">
        <!-- Форма без имитации входа — только интерфейс -->
        <form id="loginForm" action="#" method="post">
            <div class="input-group">
                <label for="username">Логин</label>
                <input type="text" id="username" name="username" class="input-field" placeholder="Введите ваш логин" autocomplete="username">
            </div>
            <div class="input-group">
                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" class="input-field" placeholder="••••••••" autocomplete="current-password">
            </div>
            <button type="button" class="btn-login" id="fakeLoginBtn">Вход</button>
            <div class="forgot-link">
                <a href="#" id="forgotPasswordLink">Забыли пароль?</a>
            </div>
        </form>
    </div>

    <!-- Блок уведомления о cookie (интерактивный) -->
    <div class="cookie-notice" id="cookieNotice">
        <div class="cookie-text">
            <span class="cookie-icon">🍪</span>
            <span>Мы используем файлы cookie для улучшения работы сайта и безопасности. Продолжая работу, вы соглашаетесь с политикой обработки данных.</span>
        </div>
        <button class="cookie-btn" id="acceptCookieBtn">Принять</button>
    </div>

    <div class="legal-note">
        © Уральский юридический институт МВД России · Защищенный канал связи
    </div>
</div>

<!-- Лёгкий JavaScript только для работы cookie-уведомления и нейтральных сообщений (без имитации входа) -->
<script>
    (function() {
        // Элементы
        const fakeLoginBtn = document.getElementById('fakeLoginBtn');
        const forgotLink = document.getElementById('forgotPasswordLink');
        const cookieNotice = document.getElementById('cookieNotice');
        const acceptCookieBtn = document.getElementById('acceptCookieBtn');
        const usernameInput = document.getElementById('username');
        const passwordInput = document.getElementById('password');

        // Проверка согласия на cookie
        const cookieAccepted = localStorage.getItem('urui_cookie_consent');
        if (cookieAccepted === 'true') {
            if (cookieNotice) cookieNotice.style.display = 'none';
        }

        // Функция для отображения простого информационного сообщения (не alert)
        function showInfoMessage(text, isHint = true) {
            // Удаляем предыдущее сообщение
            const existingMsg = document.querySelector('.info-message-toast');
            if(existingMsg) existingMsg.remove();

            const msgDiv = document.createElement('div');
            msgDiv.className = 'info-message-toast';
            msgDiv.innerText = text;
            msgDiv.style.position = 'fixed';
            msgDiv.style.bottom = '30px';
            msgDiv.style.left = '50%';
            msgDiv.style.transform = 'translateX(-50%)';
            msgDiv.style.backgroundColor = '#0a2f6c';
            msgDiv.style.color = 'white';
            msgDiv.style.padding = '12px 24px';
            msgDiv.style.borderRadius = '60px';
            msgDiv.style.fontWeight = '500';
            msgDiv.style.fontSize = '0.85rem';
            msgDiv.style.zIndex = '9999';
            msgDiv.style.boxShadow = '0 8px 20px rgba(0,0,0,0.2)';
            msgDiv.style.border = '1px solid rgba(255,255,255,0.3)';
            msgDiv.style.fontFamily = 'inherit';
            msgDiv.style.pointerEvents = 'none';
            msgDiv.style.opacity = '0';
            msgDiv.style.transition = 'opacity 0.2s ease';
            document.body.appendChild(msgDiv);
            setTimeout(() => { msgDiv.style.opacity = '1'; }, 10);
            setTimeout(() => {
                msgDiv.style.opacity = '0';
                setTimeout(() => {
                    if(msgDiv.parentNode) msgDiv.remove();
                }, 300);
            }, 2800);
        }

        // Кнопка входа: только информационное сообщение, никакой отправки / валидации
        if (fakeLoginBtn) {
            fakeLoginBtn.addEventListener('click', function(e) {
                e.preventDefault();
                // Просто показываем сообщение о том, что форма в демо-режиме (без настоящей авторизации)
                // Для чистоты не проверяем поля — просто нейтральное уведомление
                showInfoMessage('Форма входа (демонстрационный интерфейс). Авторизация не выполняется.', false);
            });
        }

        // Забыли пароль: информационное сообщение
        if (forgotLink) {
            forgotLink.addEventListener('click', function(e) {
                e.preventDefault();
                showInfoMessage('Функция восстановления пароля доступна в демо-режиме. Обратитесь к администратору.', false);
            });
        }

        // Принятие cookie
        function acceptCookies() {
            localStorage.setItem('urui_cookie_consent', 'true');
            if (cookieNotice) {
                cookieNotice.style.transition = 'opacity 0.25s ease';
                cookieNotice.style.opacity = '0';
                setTimeout(() => {
                    if(cookieNotice) cookieNotice.style.display = 'none';
                }, 250);
            }
            showInfoMessage('Настройки cookie сохранены.', true);
        }

        if (acceptCookieBtn) {
            acceptCookieBtn.addEventListener('click', acceptCookies);
        }

        // Автофокус на поле логин для удобства
        if(usernameInput) usernameInput.focus();

        // Не выполняем никакой имитации входа — полное соответствие запросу: удалена имитация входа
        // Также все действия носят исключительно информационный характер, без проверки логина/пароля.
    })();
</script>
</body>
</html>