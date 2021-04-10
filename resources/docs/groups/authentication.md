# Authentication


## Login




> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"ut","password":"ullam"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "ut",
    "password": "ullam"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "data": {
        "id": 7,
        "name": "user",
        "email": "user@user.com",
        "phone": "null",
        "address": "null",
        "active": "null",
        "display_name": "null",
        "gender": "null",
        "telephone": "null",
        "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIzIiwianRpIjoiNTU1OTYyYjVmZmMxODY",
        "email_verified_at": "null",
        "created_at": "2020-12-09T18:29:58.000000Z",
        "updated_at": "2020-12-09T18:29:58.000000Z"
    }
}
```
> Example response (422, Invalid Credentials):

```json
{
    "errors": [
        "Invalid Credentials."
    ]
}
```
<div id="execution-results-POSTapi-v1-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-v1-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-login"></code></pre>
</div>
<div id="execution-error-POSTapi-v1-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-login"></code></pre>
</div>
<form id="form-POSTapi-v1-login" data-method="POST" data-path="api/v1/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-v1-login" onclick="tryItOut('POSTapi-v1-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-v1-login" onclick="cancelTryOut('POSTapi-v1-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-v1-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/v1/login</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-v1-login" data-component="body" required  hidden>
<br>
User Email.</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-v1-login" data-component="body" required  hidden>
<br>
User Password.</p>

</form>


## Register




> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"recusandae","email":"provident","password":"qui","password_confirmation":"voluptatem"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "recusandae",
    "email": "provident",
    "password": "qui",
    "password_confirmation": "voluptatem"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (201, User Created):

```json
{
    "data": {
        "id": 7,
        "name": "user",
        "email": "user@user.com",
        "phone": "null",
        "address": "null",
        "active": "null",
        "display_name": "null",
        "gender": "null",
        "telephone": "null",
        "email_verified_at": "null",
        "created_at": "2020-12-09T18:29:58.000000Z",
        "updated_at": "2020-12-09T18:29:58.000000Z"
    }
}
```
> Example response (422, Existing Email):

```json
{
    "errors": [
        "The email has already been taken."
    ]
}
```
> Example response (422, Passwords does not match):

```json
{
    "errors": [
        "The password confirmation does not match."
    ]
}
```
<div id="execution-results-POSTapi-v1-register" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-v1-register"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-register"></code></pre>
</div>
<div id="execution-error-POSTapi-v1-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-register"></code></pre>
</div>
<form id="form-POSTapi-v1-register" data-method="POST" data-path="api/v1/register" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-register', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-v1-register" onclick="tryItOut('POSTapi-v1-register');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-v1-register" onclick="cancelTryOut('POSTapi-v1-register');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-v1-register" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/v1/register</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-v1-register" data-component="body" required  hidden>
<br>
Username.</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-v1-register" data-component="body" required  hidden>
<br>
User Email.</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-v1-register" data-component="body" required  hidden>
<br>
User Password. Should be minimum 8 characters.</p>
<p>
<b><code>password_confirmation</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password_confirmation" data-endpoint="POSTapi-v1-register" data-component="body" required  hidden>
<br>
User Password Conformation. Should be minimum 8 characters.</p>

</form>


## Logout

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/logout" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/logout"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200, success):

```json

{
"message":{
     "Successfully logged out"
 }
}
```
<div id="execution-results-GETapi-v1-logout" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-logout"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-logout"></code></pre>
</div>
<div id="execution-error-GETapi-v1-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-logout"></code></pre>
</div>
<form id="form-GETapi-v1-logout" data-method="GET" data-path="api/v1/logout" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-logout', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-v1-logout" onclick="tryItOut('GETapi-v1-logout');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-v1-logout" onclick="cancelTryOut('GETapi-v1-logout');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-v1-logout" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/logout</code></b>
</p>
<p>
<label id="auth-GETapi-v1-logout" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-v1-logout" data-component="header"></label>
</p>
</form>


## Get Current User
Use this endpoint to get current User.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "data": {
        "id": 7,
        "name": "user",
        "email": "user@user.com",
        "phone": "null",
        "address": "null",
        "active": "null",
        "display_name": "null",
        "gender": "null",
        "telephone": "null",
        "email_verified_at": "null",
        "created_at": "2020-12-09T18:29:58.000000Z",
        "updated_at": "2020-12-09T18:29:58.000000Z"
    }
}
```
> Example response (422, Existing Email):

```json
{
    "errors": [
        "The email has already been taken."
    ]
}
```
<div id="execution-results-GETapi-v1-user" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-user"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-user"></code></pre>
</div>
<div id="execution-error-GETapi-v1-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-user"></code></pre>
</div>
<form id="form-GETapi-v1-user" data-method="GET" data-path="api/v1/user" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-user', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-v1-user" onclick="tryItOut('GETapi-v1-user');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-v1-user" onclick="cancelTryOut('GETapi-v1-user');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-v1-user" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/user</code></b>
</p>
</form>


## Validate Token
Use this endpoint to check if token is valid.


Return 200 if valid, 401 if invalid.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/validate-token" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/validate-token"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "data": {
        "id": 7,
        "name": "user",
        "email": "user@user.com",
        "phone": "null",
        "address": "null",
        "active": "null",
        "display_name": "null",
        "gender": "null",
        "telephone": "null",
        "email_verified_at": "null",
        "created_at": "2020-12-09T18:29:58.000000Z",
        "updated_at": "2020-12-09T18:29:58.000000Z"
    }
}
```
> Example response (401, Unauthorized):

```json
{
    "message": [
        "Unauthenticated."
    ]
}
```
<div id="execution-results-GETapi-v1-validate-token" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-validate-token"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-validate-token"></code></pre>
</div>
<div id="execution-error-GETapi-v1-validate-token" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-validate-token"></code></pre>
</div>
<form id="form-GETapi-v1-validate-token" data-method="GET" data-path="api/v1/validate-token" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-validate-token', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-v1-validate-token" onclick="tryItOut('GETapi-v1-validate-token');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-v1-validate-token" onclick="cancelTryOut('GETapi-v1-validate-token');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-v1-validate-token" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/validate-token</code></b>
</p>
</form>



