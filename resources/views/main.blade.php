<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HilfNachbar</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: 'Arial', sans-serif;
            color: #333;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            background-color: #f5f5f5; /* Светлый фон страницы */
        }

        /* Intro */
        .intro {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(255, 165, 0, 0.8); /* Спокойный оранжевый тон */
            z-index: 10;
            overflow: hidden;
        }

        .intro div {
            position: absolute;
            font-size: 80px;
            font-weight: bold;
            color: #888; /* Серый цвет текста */
            white-space: nowrap;
            transform-origin: center;
            opacity: 1;
            animation: slideLeft 4s forwards;
            transition: transform 0.5s ease-in-out;
        }

        .intro div:nth-child(1) {
            transform: rotate(-15deg);
            animation-delay: 0s;
            top: 10%;
            left: 10%;
        }

        .intro div:nth-child(2) {
            transform: rotate(10deg);
            animation-delay: 1s;
            top: 30%;
            left: 40%;
        }

        .intro div:nth-child(3) {
            transform: rotate(-5deg);
            animation-delay: 2s;
            top: 50%;
            left: 60%;
        }

        .intro div:nth-child(4) {
            transform: rotate(25deg);
            animation-delay: 3s;
            top: 70%;
            left: 80%;
        }

        @keyframes slideLeft {
            0% {
                opacity: 1;
                transform: translateX(0);
            }
            100% {
                opacity: 0;
                transform: translateX(-2000px);
            }
        }

        /* Навигация */
        nav {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        nav ul {
            list-style-type: none;
            display: flex;
            gap: 30px;
        }

        nav ul li a {
            text-decoration: none;
            font-weight: bold;
            color: #fff;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #ffeb3b;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #ffeb3b;
        }

        .login-button a {
            background-color: #ffeb3b;
            color: #333;
            padding: 10px 20px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .login-button a:hover {
            background-color: #fff;
        }

        /* Хедер */
        header {
            text-align: right;
            padding: 80px 5%;
            background: rgba(0, 0, 0, 0.5);
            position: relative;
            z-index: 1;
        }

        header h1 {
            font-size: 56px;
            font-weight: bold;
            color: #ffeb3b;
            margin-bottom: 20px;
        }

        header p {
            font-size: 24px;
            max-width: 500px;
            margin-left: auto;
            color: #fff;
        }

        /* Основной контент */
        main {
            max-width: 1200px;
            margin: 60px auto;
            padding: 0 5%;
            text-align: right;
            z-index: 1;
            position: relative;
            opacity: 0;
            transform: translateY(50px);
            animation: fadeInUp 1.2s forwards;
            animation-delay: 4s; /* Задержка анимации для основного контента */
        }

        main h2 {
            font-size: 42px;
            margin-bottom: 20px;
            color: #ffeb3b;
        }

        main p, main ul {
            font-size: 20px;
            line-height: 1.8;
            color: #333;
        }

        main ul {
            list-style: none;
            padding-left: 0;
        }

        main ul li {
            margin-bottom: 20px;
        }

        main ul li strong {
            color: #ffeb3b;
        }

        /* Подвал */
        footer {
            background-color: rgba(0, 0, 0, 0.6);
            color: #ffeb3b;
            text-align: center;
            padding: 30px 5%;
            font-size: 16px;
            position: relative;
            z-index: 1;
        }

        /* Анимации */
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Адаптивность */
        @media (max-width: 768px) {
            header h1 {
                font-size: 36px;
            }

            header p {
                font-size: 18px;
            }

            main h2 {
                font-size: 32px;
            }

            main p, main ul {
                font-size: 16px;
            }

            nav ul {
                gap: 15px;
            }

            .logo {
                font-size: 24px;
            }

            .login-button a {
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>
    <!-- Элементы Intro -->
    <div class="intro" id="intro">
        <div>Grau</div>
        <div>Einsamkeit</div>
        <div>Isolation</div>
        <div>Unsicherheit</div>
    </div>

    <!-- Навигация -->
    <nav>
        <div class="logo">HilfNachbar</div>
        <ul>
            <li><a href="/services">Dienstleistungen</a></li>
            <li><a href="/forum">Forum</a></li>
            <li><a href="/contacts">Kontakte</a></li>
        </ul>
        <div class="login-button">
            <a href="#">Login</a>
        </div>
    </nav>

    <!-- Хедер -->
    <header>
        <h1>Willkommen bei HilfNachbar!</h1>
        <p>Eine Plattform zur Bereitstellung von Dienstleistungen für alleinstehende oder ältere Menschen.</p>
    </header>

    <!-- Основной контент -->
    <main>
        <h2>So funktioniert’s:</h2>
        <p>Hier können Sie ganz einfach Hilfe im Alltag finden oder selbst anbieten.</p>

        <ul>
            <li><strong>Anmelden:</strong> Wählen Sie, ob Sie Hilfe suchen (Kunde) oder anbieten (Dienstleister) möchten.</li>
            <li><strong>Profil erstellen:</strong> Beschreiben Sie Ihre Interessen oder angebotenen Dienstleistungen.</li>
            <li><strong>Dienstleistungen entdecken:</strong> Durchstöbern Sie Kategorien wie Haushaltshilfe, Technik-Unterstützung.</li>
            <li><strong>Buchen leicht gemacht:</strong> Wählen Sie eine Dienstleistung und einen Termin. Der Dienstleister bestätigt den Auftrag.</li>
            <li><strong>Bewertungen:</strong> Teilen Sie Ihre Erfahrungen nach dem Service.</li>
        </ul>

        <p><strong>Fragen?</strong> Kontaktieren Sie uns für weitere Informationen!</p>
    </main>

    <!-- Подвал -->
    <footer>
        <p>HilfNachbar – Gemeinsam mehr erreichen!</p>
    </footer>
</body>
</html>