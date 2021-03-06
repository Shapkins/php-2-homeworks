# Задача 1. Учёт расходов

#### Утилита для ведения таблицы расходов

## Описание
Результатом выполнения задачи является скрипт money.php, который позволяет добавлять стоимость и описание покупки в таблицу и при запросе выводит сумму расходов за день.

## Реализация
Для получения аргументов скрипта следует использовать массив [$argv](http://php.net/manual/ru/reserved.variables.argv.php).

Чтобы вводить описание покупки без кавычек следует "склеить" часть массива в одну строку. Для получения части массива можно воспользоваться функцией [array_slice](http://php.net/manual/ru/function.array-slice.php). Для объединения значений массива в строку - функция [implode](http://php.net/manual/ru/function.implode.php).

Данные хранить в таблице CSV, которую создать в той же папке, что и скрипт.

Если вместо данных о покупке передан флаг `--today` - скрипт должен проверить, что файл существует, открыть файл, пройтись по всем строкам от начала и просуммировать значение стоимости покупки за текущий день.

Каждая строка должная быть в формате `дата, стоимость, описание`. Для записи даты следует использовать функцию `date` с аргументом, например, `'Y-m-d'`. Соответственно, чтобы узнать за текущий день сделана запись или нет - нужно сравнить значение в таблице с результатом такого же вызова:

```
if ($row[0] === date('Y-m-d')) {
	...
```

Следует провести валидацию (проверку) получаемых аргументов: скрипт должен корректно работать (сообщать об ошибке, например), если утилита будет запущена без параметров. Также перед добавлением строки данных нужно убедиться, что файл доступен для записи. Программист всегда должен задумываться, что может пойти неправильно.

## Примеры
Добавление строки в таблицу происходит следующим образом:
```
# php money.php 256.00 праздничный кекс
```

Результат:
```
# Добавлена строка: 13.09.2018, 256.00, праздничный кекс
```

Получение суммы расходов за текущий день:
```
# php money.php --today
```

Результат:
```
# 13.09.2018 расход за день: 1024.00
```

Неправильный запуск скрипта:
```
# php money.php
```

Результат:
```
# Ошибка! Аргументы не заданы. Укажите флаг --today или запустите скрипт с аргументами {цена} и {описание покупки}
```
