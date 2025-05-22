<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Регистрация</title>
    <link rel="stylesheet" href="style.css">
    <link href="../font.css" rel="stylesheet">
</head>
<body>
    <div class="content">
        <div class="left-content"> 
            <h1 class="title">Войти</h1>           
            <img class="login-photo" src="main-first-photo.png" alt="Главное фото">
        </div>         
        <form class="form" action="">
            <label class="form__name-of-input" for="email">Электропочта</label>
            <input id="email" type="email" class="form__user-information">
            <p class="form__input-info">Введите электропочту в формате *****@***.**</p>
            <label class="form__name-of-input" for="email">Пароль</label>
            <div class="form__password">
                <input class="form__user-information password" id="password" type="password">
                <img class="form__eye-off" src="marks/Eye-off.svg" alt="Скрыть">
            </div>
            <input type="submit" class="form__registration-button">
        </form>
    </div>
</body>
</html>