<h1 align="center">Выпускная квалификационная работа по теме "Автосервис"</h1>

<div align="center">
  <a href="">
    <img width="575" alt="Снимок экрана 2023-05-30 в 14 45 48" src="https://github.com/hikiasi/autoservice/blob/93d52d39dc3fa9b3f914fd8ca7f53411285c2bd5/autoservice2_(123)%20(2).png">
  </a>
  <a href="">
    <img width="575" alt="Снимок экрана 2023-05-30 в 14 45 48" src="https://github.com/hikiasi/autoservice/blob/93d52d39dc3fa9b3f914fd8ca7f53411285c2bd5/photo_2023-08-15_01-45-45.jpg">
  </a>
  <a href="">
    <img width="575" alt="Снимок экрана 2023-05-30 в 14 45 48" src="https://github.com/hikiasi/autoservice/blob/93d52d39dc3fa9b3f914fd8ca7f53411285c2bd5/photo_2023-08-15_01-47-02.jpg">
  </a>
</div>

<a name="summary">
  <details>
    <summary>Оглавление</summary>
    <ol>
      <li><a href="#project-description">Описание проекта</a></li>
      <li><a href="#technologies">Стек технологий</a></li>
      <li><a href="#installation">Установка и запуск приложения в локальном репозитории, эксплуатация</a></li>
      <li><a href="#establishing">Процесс создания</a></li>
      <li><a href="#functionality">Функционал</a></li>
      <li><a href="#enhancement">Что можно улучшить</a></li>
    </ol>
  </details>
</a>

<a name="project-description"><h2>1. Описание проекта</h2></a>
Это проект информационной системы для автосервиса, разработанный в рамках выпускной квалификационной работы. Система состоит из консольного приложения и веб-сайта.
Веб-сайт предназначен для клиентов автосервиса и сотрудников. На сайте представлена информация об услугах и ценах. 
Админ-панель позволяет администрировать базу данных - просматривать и редактировать данные о клиентах, автомобилях, сотрудниках, услугах и заказах. Также с помощью админ-панели можно формировать отчеты - заказ-наряды, отчеты о прибыли и выполненных заказах.<br>
Админ-панель сделана на SBAdmin2, сайт сделан с использование Bootstrap 5
<br>
<br>
<b>Ссылки на проект:</b>
<br>
Деплой: <i>Ссылка на деплой появится позже</i>
<br>
<h4><b>Проект завершен</b></h4>
<br>

<div align="right">(<a href="#summary">к оглавлению</a>)</div>

<a name="technologies"><h2>2. Стек технологий</h2></a>
<span>
  <img src="https://img.shields.io/badge/php-%23777BB4.svg?&style=for-the-badge&logo=php&logoColor=white" alt="Иконка 'PHP'">
  <img src="https://img.shields.io/badge/apache%20-%23D42029.svg?&style=for-the-badge&logo=apache&logoColor=white" alt="Иконка 'Apache'">
  <img src="https://img.shields.io/badge/mysql-%2300f.svg?&style=for-the-badge&logo=mysql&logoColor=white" alt="Иконка 'MySQL'">
  <img src="https://img.shields.io/badge/JavaScript-323330?style=for-the-badge&logo=javascript&logoColor=F7DF1E" alt="Иконка 'JavaScript'">
  <img src="https://img.shields.io/badge/Sass-CC6699?style=for-the-badge&logo=sass&logoColor=white" alt="Иконка 'Sass (SCSS)'">
  <img src="https://img.shields.io/badge/css3%20-%231572B6.svg?&style=for-the-badge&logo=css3&logoColor=white" alt="Иконка 'CSS3'">
  <img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="Иконка 'HTML5'">
</span>

<div align="right">(<a href="#summary">к оглавлению</a>)</div>

<a name="installation"><h2>3. Установка и запуск приложения в локальном репозитории, эксплуатация</h2></a>
1. `git clone https://github.com/hikiasi/ozone_hikiasi.git` - клонировать репозиторий на свое устройство (HTTPS)
2. Запустить `OpenServer` или другой веб-сервер, где есть Apache и MySQL
3. Импортировать БД в `phpMyAdmin` с названием `autoservice`, файл находится в admin/database
4. Изменить настройки `dbconfig.php` в admin/database
5. Запустить веб-сервер `OpenServer`

<div align="right">(<a href="#summary">к оглавлению</a>)</div>

<a name="establishing"><h2>4. Процесс создания</h2></a>
Работа выполнена в <b>4 этап</b>:
<br>
1. Формирование макета Figma
2. Верстка главной страницы
3. Верстка дополнительных страниц и админ-панели
4. Формирование логики PHP для админ-панели и дополнительных страниц с выводом цен на услуги

<div align="right">(<a href="#summary">к оглавлению</a>)</div>

<a name="functionality"><h2>5. Функционал</h2></a>
- Вывод цен на услуги из базы данных для клиентов
- Панель управления с возможностью отслеживания прибыли за месяц, за все время, количество текущих заказов, подсчет прибыли по месяцам (за весь год), статистика заказов по всем критериям (В работе, новые, завершены, отменены)
- Добавление, удаление, редактирование записей в таблицах базы данных
- Поиск, фильтрация по колонкам, вывод таблицы по страницам и отображение определенного кол-ва записей в таблице
- Формирование заказ-наряда для клиента, в котором указаны все данные о клиенте и его автомобиле, а также проделанные услуги со стоимостью. Реализован вывод на печать и сохранение в PDF
- Формирование прибыли за квартал, и вывод заказов по выбранному механику. Реализован вывод на печать и сохранение в PDF

<div align="right">(<a href="#summary">к оглавлению</a>)</div>

<a name="enhancement"><h2>6. Что можно улучшить</h2></a>
- Наладить систему подсчета прибыли
- Сделать более точным отчет "Заказ-наряд", где будут подсчитываться норм-часы для работника, детали которые были закуплены для выполнения той, или иной услуги. Для этого нужно изменить структуру БД с добавлением более детальной информации

<div align="right">(<a href="#summary">к оглавлению</a>)</div>
