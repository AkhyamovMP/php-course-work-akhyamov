# php-cource-work

***Название***: #сортер (хэштег сортер)

***Описание***: 

Сообщения, прилетающие в каналы и чаты с хэштегом необходимо сортировать по области «знаний», которые они дают.
Пример: #cake – надо будет определить как область знаний «Кулинария».

***Задача***:

разработка интерфейса и реализация просмотра сообщений от доверенных каналов. Добавить сортировку по #

## Структура БД

**Private** – флаг, который показывает, что сообщение не должны видеть другие пользователи.

**Trusted** – флаг, который отмечает канал как доверенный.

### Table **Users**
- ID (PrimaryKey)
- Email
- Password
- Username

### Table **Messages**
- ID (PrimaryKey)
- Body
- Dispatch_time
- Private (Bool)
- Hashtag (ForeignKey Hastags)
- Author  (ForeignKey Users)
- Channel (ForeignKey Channels)

### Table **Channels**
- ID (PrimaryKey)
- Name
- Description
- Owner (ForeignKey Users)
- Trusted (Bool)

### Table **Hastags**
- ID (PrimaryKey)
- Name

### Table **Topics**
- ID (PrimaryKey)
- Title
- Description

### Table **TopicHashtags_ManyToMany**
- ID (PrimaryKey)
- Hashtag (ForeignKey Hastags)
- Channel (ForeignKey Channels)
