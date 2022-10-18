<p>
    1) Миграция для создания пользователя с правами администратора: <br>
    php yii migrate --migrationPath=@andrewdanilov/adminpanel/migrations
    
    user: admin
    password: admin
</p>

<p>
    2) Миграция для создания служебных таблиц с ролями: <br>

    php yii migrate --migrationPath=@yii/rbac/migrations
</p>

<p>
    3) Создание ролей: <br>

    php yii rbac/init
</p>

<p>
    4) Присвоить текущему пользователю роль: <br>

    superAdmin: site/role-super-admin
    admin: site/role-admin
    washer: site/role-washer
    client: site/role-client
</p>

