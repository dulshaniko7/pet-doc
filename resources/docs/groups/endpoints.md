# Endpoints


## Display a listing of the resource.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/doctors" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/doctors"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-v1-doctors" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-doctors"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-doctors"></code></pre>
</div>
<div id="execution-error-GETapi-v1-doctors" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-doctors"></code></pre>
</div>
<form id="form-GETapi-v1-doctors" data-method="GET" data-path="api/v1/doctors" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-doctors', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-v1-doctors" onclick="tryItOut('GETapi-v1-doctors');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-v1-doctors" onclick="cancelTryOut('GETapi-v1-doctors');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-v1-doctors" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/doctors</code></b>
</p>
<p>
<label id="auth-GETapi-v1-doctors" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-v1-doctors" data-component="header"></label>
</p>
</form>


## Display the specified resource.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/doctors/impedit" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/doctors/impedit"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-v1-doctors--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-doctors--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-doctors--id-"></code></pre>
</div>
<div id="execution-error-GETapi-v1-doctors--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-doctors--id-"></code></pre>
</div>
<form id="form-GETapi-v1-doctors--id-" data-method="GET" data-path="api/v1/doctors/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-doctors--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-v1-doctors--id-" onclick="tryItOut('GETapi-v1-doctors--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-v1-doctors--id-" onclick="cancelTryOut('GETapi-v1-doctors--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-v1-doctors--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/doctors/{id}</code></b>
</p>
<p>
<label id="auth-GETapi-v1-doctors--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-v1-doctors--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-v1-doctors--id-" data-component="url" required  hidden>
<br>
</p>
</form>


## Display a listing of the resource.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/hospitals" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/hospitals"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-v1-hospitals" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-hospitals"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-hospitals"></code></pre>
</div>
<div id="execution-error-GETapi-v1-hospitals" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-hospitals"></code></pre>
</div>
<form id="form-GETapi-v1-hospitals" data-method="GET" data-path="api/v1/hospitals" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-hospitals', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-v1-hospitals" onclick="tryItOut('GETapi-v1-hospitals');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-v1-hospitals" onclick="cancelTryOut('GETapi-v1-hospitals');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-v1-hospitals" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/hospitals</code></b>
</p>
<p>
<label id="auth-GETapi-v1-hospitals" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-v1-hospitals" data-component="header"></label>
</p>
</form>


## Display the specified resource.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/hospitals/possimus" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/hospitals/possimus"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-v1-hospitals--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-hospitals--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-hospitals--id-"></code></pre>
</div>
<div id="execution-error-GETapi-v1-hospitals--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-hospitals--id-"></code></pre>
</div>
<form id="form-GETapi-v1-hospitals--id-" data-method="GET" data-path="api/v1/hospitals/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-hospitals--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-v1-hospitals--id-" onclick="tryItOut('GETapi-v1-hospitals--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-v1-hospitals--id-" onclick="cancelTryOut('GETapi-v1-hospitals--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-v1-hospitals--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/hospitals/{id}</code></b>
</p>
<p>
<label id="auth-GETapi-v1-hospitals--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-v1-hospitals--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-v1-hospitals--id-" data-component="url" required  hidden>
<br>
</p>
</form>


## Display a listing of the resource.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/hospitals/velit/hospital_doctors" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/hospitals/velit/hospital_doctors"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-v1-hospitals--id--hospital_doctors" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-hospitals--id--hospital_doctors"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-hospitals--id--hospital_doctors"></code></pre>
</div>
<div id="execution-error-GETapi-v1-hospitals--id--hospital_doctors" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-hospitals--id--hospital_doctors"></code></pre>
</div>
<form id="form-GETapi-v1-hospitals--id--hospital_doctors" data-method="GET" data-path="api/v1/hospitals/{id}/hospital_doctors" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-hospitals--id--hospital_doctors', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-v1-hospitals--id--hospital_doctors" onclick="tryItOut('GETapi-v1-hospitals--id--hospital_doctors');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-v1-hospitals--id--hospital_doctors" onclick="cancelTryOut('GETapi-v1-hospitals--id--hospital_doctors');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-v1-hospitals--id--hospital_doctors" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/hospitals/{id}/hospital_doctors</code></b>
</p>
<p>
<label id="auth-GETapi-v1-hospitals--id--hospital_doctors" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-v1-hospitals--id--hospital_doctors" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-v1-hospitals--id--hospital_doctors" data-component="url" required  hidden>
<br>
</p>
</form>


## Display the specified resource.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/hospitals/quo/hospital_doctors/veniam" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/hospitals/quo/hospital_doctors/veniam"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-v1-hospitals--id--hospital_doctors--doctor_id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-hospitals--id--hospital_doctors--doctor_id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-hospitals--id--hospital_doctors--doctor_id-"></code></pre>
</div>
<div id="execution-error-GETapi-v1-hospitals--id--hospital_doctors--doctor_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-hospitals--id--hospital_doctors--doctor_id-"></code></pre>
</div>
<form id="form-GETapi-v1-hospitals--id--hospital_doctors--doctor_id-" data-method="GET" data-path="api/v1/hospitals/{id}/hospital_doctors/{doctor_id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-hospitals--id--hospital_doctors--doctor_id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-v1-hospitals--id--hospital_doctors--doctor_id-" onclick="tryItOut('GETapi-v1-hospitals--id--hospital_doctors--doctor_id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-v1-hospitals--id--hospital_doctors--doctor_id-" onclick="cancelTryOut('GETapi-v1-hospitals--id--hospital_doctors--doctor_id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-v1-hospitals--id--hospital_doctors--doctor_id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/hospitals/{id}/hospital_doctors/{doctor_id}</code></b>
</p>
<p>
<label id="auth-GETapi-v1-hospitals--id--hospital_doctors--doctor_id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-v1-hospitals--id--hospital_doctors--doctor_id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-v1-hospitals--id--hospital_doctors--doctor_id-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>doctor_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="doctor_id" data-endpoint="GETapi-v1-hospitals--id--hospital_doctors--doctor_id-" data-component="url" required  hidden>
<br>
</p>
</form>



