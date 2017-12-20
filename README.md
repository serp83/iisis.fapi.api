# iisis.fapi.api
База кроссов автозапчастей FAPI. Описание доступа через API

**Получить объект кроссы**
----
Возвращает json объект AnalogList

* **URL**

http://fapi.iisis.ru/fapi/v2/analogList

* **Method:**
  
  `GET`
  
*  **URL Параметры**

    `n=[string]` - номер искомой детали<br />
    `ui=[string]` - идентификатор пользователя. Условия получения ключа http://fapi.iisis.ru


* **Request Headers**

   `Accept:application/json` <br />
   `Cache-Control:no-cache` <br />
    
* **При успешном ответе:**
  
  * **Code:** 200 <br />
    **Content:** 
  ```
    {
      "manufacturerList": {         //Список брендов
        "mf": [
          {
            "i": 0,                 //Индекс
            "ds": "NPS",            //Описание бренда в верхнем регистре (Description Standart) 
            "da": "NPS"             //Описание бренда в верхнем регистре без спец. символов (Description Adapt)
          },
          {
            "i": 1,
            "ds": "CHEVROLET",
            "da": "CHEVROLET"
          },
          {
            "i": 2,
            "ds": "DAEWOO",
            "da": "DAEWOO"
          }
        ]
      },
      "productList": {              //Список деталей
        "p": [
          {
            "i": 0,                 //Индекс
            "mfi": 0,               //Внешний ключ на manufacturerList.i
            "ns": "d735o05",        //Стандартизированный номер(артикул) без спец. символов
            "n": "D735O05",         //Номер(артикул)    
            "d": "Буфер"            //Описание детали
          },
          {
            "i": 1,                 //Index
            "mfi": 0,               //Manufacturer index    
            "ns": "96235861",       //Number standart
            "n": "96235861",        //Number
            "d": ""                 //Description
          },
          {
            "i": 2,
            "mfi": 1,
            "ns": "96235861",
            "n": "96235861",
            "d": ""
          },
          {
            "i": 3,
            "mfi": 2,
            "ns": "96235861",
            "n": "96235861",
            "d": ""
          }
        ]
      },
      "analogList": {               //Кроссировочная таблица связей деталей
        "a": [
          {
            "i": 73347655,          //Индекс
            "pri": 0,               //Не используется
            "si": 8,                //Не используется
            "di": 53,               //Не используется
            "pi": 0,                //Ссылка на ДЕТАЛЬ (внешний ключ на productList.i)
            "mfi": 0,               //Ссылка на БРЕНД (внешний ключ на manufacturerList.i) 
            "ns": "d735o05",        //Стандартизированный НОМЕР
            "pai": 1,               //Ссылка на КРОСС_ДЕТАЛЬ (внешний ключ на productList.i)
            "mfai": 0,              //Ссылка на КРОСС_БРЕНД (внешний ключ на manufacturerList.i)
            "nsa": "96235861",      //Стандартизированный КРОСС_НОМЕР
            "_int": -1,             //Ваш голос за кросс(можете установить в расширении для браузера). 
                                    // Значения: -1 - не установлен; 1 - кросс БИТЫЙ; 0 - кросс ВЕРНЫЙ
            "rm": 0,                //Количество голосов участников и программных обработчиков, что кросс БИТЫЙ
            "rp": 2                 //Количество голосов участников и программных обработчиков, что кросс ВЕРНЫЙ
          },
          {
            "i": 197698468,         //Index
            "pri": 91,
            "si": 8,
            "di": 118,
            "pi": 0,                //Product index
            "mfi": 0,               //Manufacturer index
            "ns": "d735o05",        //Number standart
            "pai": 2,               //Product analog index
            "mfai": 1,              //Manufacturer analog index
            "nsa": "96235861",      //Number standart analog
            "_int": 0,
            "rm": 0,                //Rating minus
            "rp": 1                 //Rating plus
          },
          {
            "i": 199038906,
            "pri": 91,
            "si": 8,
            "di": 118,
            "pi": 0,
            "mfi": 0,
            "ns": "d735o05",
            "pai": 3,
            "mfai": 2,
            "nsa": "96235861",
            "_int": 0,
            "rm": 0,
            "rp": 1
          }
        ]
      },
      "sourceList": {},
      "messageList": {
        "m": []
      }
    }
    
 
* **Ошибка ответа:**

  * **Code:** 500 Internal Server Error <br />

  OR

  * **Code:** 200 <br />
    **Content:** 
   ```
    {
      "manufacturerList": {},
      "productList": {},
      "analogList": {},
      "sourceList": {},
      "messageList": {
        "m": [
          {
            "i": 1,
            "l": 0,
            "d": "Описание ошибки"
          }
        ]
      }
    }


* **Описание:**

  `manufacturerList` - таблица общего списка брендов<br />
  `productList`		- таблица общего списка деталей<br />
  `analogList` - таблица кроссов. Она то и определяет кроссирующую связь<br />
  `sourceList` - таблица источников(не используется)<br />
  
* **Подсказки:**  
  
  Уникальный индекс при манипуляциях: mfi + "." + ns - точно определяет деталь. 
