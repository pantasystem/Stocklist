---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://10.200.3.189/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_535e1188fa3ce491f9abb9e5774a5094 -->
## Return an empty response simply to trigger the storage of the CSRF cookie in the browser.

> Example request:

```bash
curl -X GET \
    -G "http://10.200.3.189/api/csrf-cookie" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/csrf-cookie"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET api/csrf-cookie`


<!-- END_535e1188fa3ce491f9abb9e5774a5094 -->

<!-- START_b6abd12bcef0c2bff565f6f2cc8387c1 -->
## 自分の所属しているHomeを取得します。

> Example request:

```bash
curl -X GET \
    -G "http://10.200.3.189/api/homes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/homes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/homes`


<!-- END_b6abd12bcef0c2bff565f6f2cc8387c1 -->

<!-- START_256614aeb4b0fc76d333ecc60b34b88f -->
## 自分が所属しているHomeの収納を全て取得します。

> Example request:

```bash
curl -X GET \
    -G "http://10.200.3.189/api/boxes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/boxes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/boxes`


<!-- END_256614aeb4b0fc76d333ecc60b34b88f -->

<!-- START_bcab03cfb84e49724af518980f54a8a7 -->
## 収納をIdに基づいて表示します。

> Example request:

```bash
curl -X GET \
    -G "http://10.200.3.189/api/boxes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/boxes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/boxes/{box_id}`


<!-- END_bcab03cfb84e49724af518980f54a8a7 -->

<!-- START_07fb85e5d8610027392f9f49c33a97c1 -->
## 物を作成します。

> Example request:

```bash
curl -X POST \
    "http://10.200.3.189/api/items" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/items"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/items`


<!-- END_07fb85e5d8610027392f9f49c33a97c1 -->

<!-- START_2d89b427b331f35cdded42a87b6e4acc -->
## 自分の所属しているHomeの物を全て取得します。
またsince_updated_atを指定するとそれ以降に作成、更新された物を取得することができます。

> Example request:

```bash
curl -X GET \
    -G "http://10.200.3.189/api/items" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/items"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/items`


<!-- END_2d89b427b331f35cdded42a87b6e4acc -->

<!-- START_26ca08593e8681c3c477fc86d5ce30e9 -->
## 物をIdで表示します。

> Example request:

```bash
curl -X GET \
    -G "http://10.200.3.189/api/items/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/items/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/items/{item_id}`


<!-- END_26ca08593e8681c3c477fc86d5ce30e9 -->

<!-- START_72020bc23561e84002574779796c1e43 -->
## 指定した物を更新します。

> Example request:

```bash
curl -X PUT \
    "http://10.200.3.189/api/items/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/items/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/items/{item_id}`


<!-- END_72020bc23561e84002574779796c1e43 -->

<!-- START_2ec1d42f10af712dfa16a2aea8d3f762 -->
## ストックを全て取得します。
QueryParameterにitem_id, box_idを指定することでフィルタすることができます(AND条件)

> Example request:

```bash
curl -X GET \
    -G "http://10.200.3.189/api/stocks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/stocks"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/stocks`


<!-- END_2ec1d42f10af712dfa16a2aea8d3f762 -->

<!-- START_4a8f30403319f686b8a9d11d6fd5208a -->
## Stockを作成します。

> Example request:

```bash
curl -X POST \
    "http://10.200.3.189/api/stocks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/stocks"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/stocks`


<!-- END_4a8f30403319f686b8a9d11d6fd5208a -->

<!-- START_27701f804284b7541fc2521ce2f2596b -->
## Stockを表示します。

> Example request:

```bash
curl -X GET \
    -G "http://10.200.3.189/api/stocks/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/stocks/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/stocks/{stock_id}`


<!-- END_27701f804284b7541fc2521ce2f2596b -->

<!-- START_6e8fc8a00b9f88a058695fd1fd8875ac -->
## Stockを更新します。

> Example request:

```bash
curl -X PUT \
    "http://10.200.3.189/api/stocks/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/stocks/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/stocks/{stock_id}`


<!-- END_6e8fc8a00b9f88a058695fd1fd8875ac -->

<!-- START_109013899e0bc43247b0f00b67f889cf -->
## 自分の所属しているHomeカテゴリーを全て取得します。

> Example request:

```bash
curl -X GET \
    -G "http://10.200.3.189/api/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/categories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/categories`


<!-- END_109013899e0bc43247b0f00b67f889cf -->

<!-- START_2335abbed7f782ea7d7dd6df9c738d74 -->
## カテゴリを作成します。

> Example request:

```bash
curl -X POST \
    "http://10.200.3.189/api/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/categories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/categories`


<!-- END_2335abbed7f782ea7d7dd6df9c738d74 -->

<!-- START_0e07c23b70bf5976e6339ccd8c9ca63e -->
## カテゴリを更新します。

> Example request:

```bash
curl -X PUT \
    "http://10.200.3.189/api/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/categories/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/categories/{category_id}`


<!-- END_0e07c23b70bf5976e6339ccd8c9ca63e -->

<!-- START_3b414a6721415a71c9a19f16334276f9 -->
## カテゴリを削除します。

> Example request:

```bash
curl -X DELETE \
    "http://10.200.3.189/api/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/categories/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/categories/{category_id}`


<!-- END_3b414a6721415a71c9a19f16334276f9 -->

<!-- START_41c4cd65a0311f8215d1ed0103a2bb3e -->
## 収納を作成します。

> Example request:

```bash
curl -X POST \
    "http://10.200.3.189/api/boxes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/boxes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/boxes`


<!-- END_41c4cd65a0311f8215d1ed0103a2bb3e -->

<!-- START_6d308b8aa3d4ec604003b390b67f2bec -->
## 収納を更新します。

> Example request:

```bash
curl -X PUT \
    "http://10.200.3.189/api/boxes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/boxes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/boxes/{box_id}`


<!-- END_6d308b8aa3d4ec604003b390b67f2bec -->

<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## api/login
> Example request:

```bash
curl -X POST \
    "http://10.200.3.189/api/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/login`


<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->

<!-- START_61739f3220a224b34228600649230ad1 -->
## api/logout
> Example request:

```bash
curl -X POST \
    "http://10.200.3.189/api/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/logout`


<!-- END_61739f3220a224b34228600649230ad1 -->

<!-- START_8d257f00ca3c289f6956272f4ae6b332 -->
## 自分の所属しているHomeの買い物リストを全て取得します。

> Example request:

```bash
curl -X GET \
    -G "http://10.200.3.189/api/shopping-lists" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/shopping-lists"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/shopping-lists`


<!-- END_8d257f00ca3c289f6956272f4ae6b332 -->

<!-- START_ab74884e3c1bb4e209632aa04bec35a4 -->
## 買い物リストを表示します。

> Example request:

```bash
curl -X GET \
    -G "http://10.200.3.189/api/shopping-lists/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/shopping-lists/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/shopping-lists/{shopping_list_id}`


<!-- END_ab74884e3c1bb4e209632aa04bec35a4 -->

<!-- START_04d3ae18a7cc7e0c6722464c9eaee5e8 -->
## 買い物リストを更新します。

> Example request:

```bash
curl -X PUT \
    "http://10.200.3.189/api/shopping-lists/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/shopping-lists/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/shopping-lists/{shopping_list_id}`


<!-- END_04d3ae18a7cc7e0c6722464c9eaee5e8 -->

<!-- START_f13bfb5cfc00ccf449b1db148b090b47 -->
## 買い物リストを作成します。

> Example request:

```bash
curl -X POST \
    "http://10.200.3.189/api/shopping-lists" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/shopping-lists"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/shopping-lists`


<!-- END_f13bfb5cfc00ccf449b1db148b090b47 -->

<!-- START_9277ba20f5175d25789239f43c5e698d -->
## 買い物リストを削除します。

> Example request:

```bash
curl -X DELETE \
    "http://10.200.3.189/api/shopping-lists/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/shopping-lists/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/shopping-lists/{shopping_list_id}`


<!-- END_9277ba20f5175d25789239f43c5e698d -->

<!-- START_8e84615877d224db68ca54a1e19c6765 -->
## 買い物リストにタスクを追加します。

> Example request:

```bash
curl -X POST \
    "http://10.200.3.189/api/shopping-lists/1/tasks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/shopping-lists/1/tasks"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/shopping-lists/{shopping_list_id}/tasks`


<!-- END_8e84615877d224db68ca54a1e19c6765 -->

<!-- START_a9008d2778493892b49da84aa818dcec -->
## タスクを更新します。

> Example request:

```bash
curl -X PUT \
    "http://10.200.3.189/api/shopping-lists/1/tasks/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/shopping-lists/1/tasks/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/shopping-lists/{shopping_list_id}/tasks/{task_id}`


<!-- END_a9008d2778493892b49da84aa818dcec -->

<!-- START_4b89bdc0ad941de02ffe940a5a9d6b69 -->
## タスクを削除します。

> Example request:

```bash
curl -X DELETE \
    "http://10.200.3.189/api/shopping-lists/1/tasks/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/shopping-lists/1/tasks/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/shopping-lists/{shopping_list_id}/tasks/{task_id}`


<!-- END_4b89bdc0ad941de02ffe940a5a9d6b69 -->

<!-- START_7fd629503ab15c43e3bff9cef54174d3 -->
## タスクの状態を完了にします。

> Example request:

```bash
curl -X POST \
    "http://10.200.3.189/api/shopping-lists/1/tasks/1/complete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/shopping-lists/1/tasks/1/complete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/shopping-lists/{shopping_list_id}/tasks/{task_id}/complete`


<!-- END_7fd629503ab15c43e3bff9cef54174d3 -->

<!-- START_4b473377c13b1a703f612271334bfbe9 -->
## タスクの状態を未完了にします。

> Example request:

```bash
curl -X POST \
    "http://10.200.3.189/api/shopping-lists/1/tasks/1/incomplete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://10.200.3.189/api/shopping-lists/1/tasks/1/incomplete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/shopping-lists/{shopping_list_id}/tasks/{task_id}/incomplete`


<!-- END_4b473377c13b1a703f612271334bfbe9 -->


