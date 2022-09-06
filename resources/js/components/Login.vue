<template>
    <div class="d-flex align-items-center justify-content-center flex-column">
        <div class="d-flex flex-column p-5 w-75">
            <h1>Login</h1>
            <div class="w-auto mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" class="form-control" v-model="email" />
            </div>
            <div class="w-auto mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" class="form-control" v-model="password" />
            </div>
            <div class="d-flex flex-column align-items-center mt-3">
                <input class="btn btn-primary mb-3" type="button" value="Login" @click="login" />
                <a href="/register"><label style="cursor: pointer">Register</label></a>
            </div>
        </div>
    </div>
</template>

<script>
import iziToast from "izitoast";
import "izitoast/dist/css/iziToast.min.css";

export default {
    data() {
        return {
            email: "",
            password: "",
        };
    },
    methods: {
        async login() {
            if (this.email == "" || this.password == "") {
                iziToast.error({
                    iconUrl: "/assets/error.png",
                    title: "Login Error",
                    message: "Please fill up all input fields.",
                    position: "topRight",
                });
                return false;
            }
            if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email)) {
                iziToast.error({
                    iconUrl: "/assets/error.png",
                    title: "Login Error",
                    message: "Email is not valid.",
                    position: "topRight",
                });
                return false;
            }
            try {
                const data = { email: this.email, password: this.password };
                const rawResponse = await fetch("/login/log", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                        Accept: "application/json",
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(data),
                });
                const content = await rawResponse.json();
                if (content == 1) {
                    iziToast.success({
                        iconUrl: "/assets/check.png",
                        title: "Login Success",
                        message: "You will now be redirected to dashboard.",
                        position: "bottomLeft",
                    });
                    setTimeout(() => {
                        location.reload();
                    }, 5000);
                }
            } catch (error) {
                iziToast.error({
                    iconUrl: "/assets/error.png",
                    title: "Login Error",
                    message: "Wrong Email or Password.",
                    position: "topRight",
                });
            }
        },
    },
    mounted() {
        console.log("Mounted");
    },
};
</script>
