require("./bootstrap");

import { createApp } from "vue";
import Login from "./components/Login";
import Register from "./components/Register";
import Dashboard from "./components/Dashboard";

// export function catchEm(promise) {
//     return promise.then((data) => [null, data]).catch((err) => [err]);
// }

const app = createApp({});

app.component("Login", Login);
app.component("Register", Register);
app.component("Dashboard", Dashboard);

app.mount("#app");
