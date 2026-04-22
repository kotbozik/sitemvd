document.addEventListener('DOMContentLoaded', function() {
    // ========== НАВИГАЦИЯ ==========
    const navItems = document.querySelectorAll('.nav-item');
    const columns = document.querySelectorAll('.column');
    
    navItems.forEach(item => {
        item.addEventListener('click', function() {
            const targetClass = this.getAttribute('data-column');
            navItems.forEach(nav => nav.classList.remove('active'));
            columns.forEach(col => col.classList.remove('active'));
            this.classList.add('active');
            const targetColumn = document.querySelector('.' + targetClass);
            if (targetColumn) targetColumn.classList.add('active');
        });
    });

    // ========== ПАНЕЛЬ ДОСТУПНОСТИ ==========
    const panel = document.getElementById('a11y-panel');
    const openBtn = document.querySelector('[data-action="open-a11y-view"]');
    const closeBtn = document.querySelector('[data-action="close-a11y-view"]');
    const fontSizeRange = document.getElementById('font-size-range');
    const fontSizeBtns = document.querySelectorAll('[data-font-size]');
    const themeBtns = document.querySelectorAll('[data-theme]');
    const imageRadios = document.querySelectorAll('input[name="a11y-images"]');
    const kernBtns = document.querySelectorAll('[data-letter-spacing]');
    
    // ГЛАВНАЯ ФУНКЦИЯ - меняет размер ВСЕГО текста на странице
    function setFontSize(size) {
        // Приводим к числу и ограничиваем
        let px = Number(size);
        if (isNaN(px)) px = 18;
        px = Math.min(24, Math.max(16, px));
        
        // Устанавливаем CSS переменную
        document.documentElement.style.setProperty('--a11y-font-size', px + 'px');
        
        // Если режим доступности активен - меняем размер на body
        if (document.body.classList.contains('a11y-mode')) {
            document.body.style.fontSize = px + 'px';
            // Принудительно применяем ко всем элементам через style
            document.querySelectorAll('.main-content, .main-content *').forEach(el => {
                if (el.style) el.style.fontSize = 'inherit';
            });
        }
        
        // Сохраняем в localStorage
        localStorage.setItem('a11y_font_size', px);
        
        // Обновляем ползунок
        if (fontSizeRange) fontSizeRange.value = px;
        
        // Обновляем активные кнопки
        fontSizeBtns.forEach(btn => {
            const btnSize = Number(btn.getAttribute('data-font-size'));
            btn.classList.toggle('is-active', btnSize === px);
        });
        
        console.log('Размер шрифта изменён на:', px + 'px');
    }
    
    // Функция открытия панели
    function openPanel() {
        if (!panel) return;
        
        // Скрываем модалку языка
        const langModal = document.getElementById('lang-modal');
        if (langModal) langModal.classList.add('is-hidden');
        
        // Показываем панель
        panel.classList.remove('is-hidden');
        
        // Добавляем классы на body - ЭТО ВКЛЮЧАЕТ РЕЖИМ
        document.body.classList.add('a11y-mode');
        document.body.classList.add('a11y-panel-open');
        
        // Загружаем сохраненные настройки
        const savedFontSize = localStorage.getItem('a11y_font_size') || '18';
        const savedTheme = localStorage.getItem('a11y_theme') || 'light';
        const savedImages = localStorage.getItem('a11y_images') || 'on';
        const savedKerning = localStorage.getItem('a11y_letter_spacing') || '0';
        
        // Применяем размер шрифта
        setFontSize(savedFontSize);
        
        // Применяем тему
        document.body.dataset.a11yTheme = savedTheme;
        
        // Применяем изображения
        document.body.classList.toggle('a11y-hide-images', savedImages === 'off');
        
        // Применяем кернинг
        document.documentElement.style.setProperty('--a11y-letter-spacing', savedKerning);
        document.body.style.letterSpacing = savedKerning;
        
        // Обновляем активные кнопки темы
        themeBtns.forEach(btn => {
            btn.classList.toggle('is-active', btn.getAttribute('data-theme') === savedTheme);
        });
        
        // Обновляем активные кнопки кернинга
        kernBtns.forEach(btn => {
            btn.classList.toggle('is-active', btn.getAttribute('data-letter-spacing') === savedKerning);
        });
        
        // Обновляем радиокнопки изображений
        imageRadios.forEach(radio => {
            radio.checked = radio.value === savedImages;
        });
        
        console.log('Режим доступности ВКЛЮЧЁН, размер текста:', savedFontSize + 'px');
    }
    
    // Функция закрытия панели
    function closePanel() {
        if (!panel) return;
        panel.classList.add('is-hidden');
        document.body.classList.remove('a11y-mode');
        document.body.classList.remove('a11y-panel-open');
        document.body.classList.remove('a11y-hide-images');
        document.body.style.fontSize = '';
        document.body.style.letterSpacing = '';
        delete document.body.dataset.a11yTheme;
        console.log('Режим доступности ВЫКЛЮЧЕН');
    }
    
    // ========== ОБРАБОТЧИКИ ==========
    
    // Кнопка открытия (очки)
    if (openBtn) {
        openBtn.addEventListener('click', openPanel);
    } else {
        console.log('Кнопка "Очки" не найдена! Ищу селектор [data-action="open-a11y-view"]');
    }
    
    // Кнопка закрытия
    if (closeBtn) closeBtn.addEventListener('click', closePanel);
    
    // Ползунок изменения размера
    if (fontSizeRange) {
        fontSizeRange.addEventListener('input', function(e) {
            setFontSize(e.target.value);
        });
    }
    
    // Кнопки увеличения/уменьшения
    fontSizeBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            setFontSize(this.getAttribute('data-font-size'));
        });
    });
    
    // Цветовые темы
    themeBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const theme = this.getAttribute('data-theme');
            document.body.dataset.a11yTheme = theme;
            localStorage.setItem('a11y_theme', theme);
            themeBtns.forEach(b => b.classList.remove('is-active'));
            this.classList.add('is-active');
        });
    });
    
    // Изображения (вкл/выкл)
    imageRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.checked) {
                const isOff = this.value === 'off';
                document.body.classList.toggle('a11y-hide-images', isOff);
                localStorage.setItem('a11y_images', this.value);
            }
        });
    });
    
    // Кернинг (межбуквенное расстояние)
    kernBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const spacing = this.getAttribute('data-letter-spacing');
            document.documentElement.style.setProperty('--a11y-letter-spacing', spacing);
            document.body.style.letterSpacing = spacing;
            localStorage.setItem('a11y_letter_spacing', spacing);
            kernBtns.forEach(b => b.classList.remove('is-active'));
            this.classList.add('is-active');
        });
    });
    
    // ========== ЯЗЫК ==========
    const langModal = document.getElementById('lang-modal');
    const openLangBtn = document.querySelector('[data-action="open-lang-modal"]');
    const langBtns = document.querySelectorAll('[data-lang]');
    const langLabel = document.getElementById('selected-lang-label');
    
    if (openLangBtn && langModal) {
        openLangBtn.addEventListener('click', () => langModal.classList.remove('is-hidden'));
        langModal.addEventListener('click', (e) => {
            if (e.target === langModal) langModal.classList.add('is-hidden');
        });
    }
    
    langBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const lang = this.getAttribute('data-lang');
            localStorage.setItem('site_lang', lang);
            document.documentElement.lang = lang === 'en' ? 'en' : 'ru';
            if (langLabel) langLabel.textContent = lang === 'en' ? 'English' : 'Русский';
            if (langModal) langModal.classList.add('is-hidden');
        });
    });
    
    // Инициализация языка
    const savedLang = localStorage.getItem('site_lang') || 'ru';
    if (langLabel) langLabel.textContent = savedLang === 'en' ? 'English' : 'Русский';
    document.documentElement.lang = savedLang === 'en' ? 'en' : 'ru';
    
    // Если панель видна при загрузке - скрываем её
    if (panel && !panel.classList.contains('is-hidden')) {
        panel.classList.add('is-hidden');
    }
    
    // ========== КНОПКА ВХОДА ==========
    const loginBtn = document.querySelector('.content-link1');
    if (loginBtn && window.LINK_CONFIG) {
        loginBtn.addEventListener('click', function(e) {
            e.preventDefault();
            window.location.href = LINK_CONFIG.login;
        });
    }
    
    console.log('Скрипт загружен. Нажмите на иконку "Очки" для открытия панели доступности');
});