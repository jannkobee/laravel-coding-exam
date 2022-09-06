<template>
    <!-- <button @click="increment">Count is: {{ count }}</button> -->
    <div class="d-flex align-items-center justify-content-center flex-column">
        <div class="d-flex flex-column p-5 w-75">
            <h1>Register</h1>
            <div class="w-auto mb-3">
                <label for="" class="form-label">Full Name</label>
                <input type="text" class="form-control" v-model="name" />
            </div>
            <div class="w-auto mb-3">
                <label for="" class="form-label">Email Address</label>
                <input type="email" class="form-control" v-model="email" />
            </div>
            <div class="w-auto mb-3">
                <label for="" class="form-label">Nominated Password</label>
                <input type="password" class="form-control" v-model="password" />
            </div>
            <div class="w-auto mb-3">
                <label for="" class="form-label">Confirmed Password</label>
                <input type="password" class="form-control" v-model="cpassword" />
            </div>
            <div class="w-auto mb-3">
                <label for="" class="form-label">Role</label>
                <select class="form-control w-auto" v-model="role">
                    <option v-for="role in roles" :value="role.id">
                        {{ role.rolename }}
                    </option>
                </select>
            </div>
            <div class="d-flex flex-column align-items-center mt-3">
                <input class="btn btn-primary mb-3" type="button" value="Register" @click="register" />
                <label>Got an account?
                    <a href="/login"><label style="cursor: pointer" class="">Login</label></a></label>
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
            name: "",
            email: "",
            password: "",
            cpassword: "",
            role: "",
            roles: [],
            users: [],
        };
    },
    methods: {
        async getData() {
            try {
                const rawResponse = await fetch("/register/getData", {
                    method: "GET",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                        Accept: "application/json",
                        "Content-Type": "application/json",
                    },
                });
                const content = await rawResponse.json();

                if (this.content[0].length > 0 && this.content[1].length > 0) {
                    this.users = content[0];
                    this.roles = content[1];
                    console.log(this.users);
                    console.log(this.roles);
                    return true;
                } else {
                    this.users = content[0];
                    this.roles = content[1];
                    console.log(this.users);
                    console.log(this.roles);
                    return true;
                }
            } catch (error) {
                return false;
            }
        },

        async register() {
            const content = await this.getData();
            console.log(content);
            if (content == 1) {
                this.request();
            } else {
                iziToast.error({
                    iconUrl: "/assets/error.png",
                    title: "Register Error",
                    message: "There seems to be a problem. Please check your Database Connection",
                    position: "bottomLeft",
                });
            }
        },

        async request() {
            if (
                this.name == "" ||
                this.email == "" ||
                this.password == "" ||
                this.cpassword == "" ||
                this.role == ""
            ) {
                iziToast.error({
                    iconUrl: "/assets/error.png",
                    title: "Register Error",
                    message: "Please fill out all input fields.",
                    position: "topRight",
                });
                return false;
            }
            if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email)) {
                iziToast.error({
                    iconUrl: "/assets/error.png",
                    title: "Register Error",
                    message: "Email is not valid.",
                    position: "topRight",
                });
                return false;
            }
            if (this.password.length < 8) {
                iziToast.error({
                    iconUrl: "/assets/error.png",
                    title: "Register Error",
                    message: "Password length must be 8 or more.",
                    position: "topRight",
                });
                return false;
            }
            if (this.password != this.cpassword) {
                iziToast.error({
                    iconUrl: "/assets/error.png",
                    title: "Register Error",
                    message: "Password not matched.",
                    position: "topRight",
                });
                return false;
            }
            for (let i = 0; i < this.users.length; i++) {
                if (this.name == this.users[i]["name"]) {
                    iziToast.error({
                        iconUrl: "/assets/error.png",
                        title: "Register Error",
                        message: "Name is already taken.",
                        position: "topRight",
                    });
                    return false;
                }
                if (this.email == this.users[i]["email"]) {
                    iziToast.error({
                        iconUrl: "/assets/error.png",
                        title: "Register Error",
                        message: "Email is already taken.",
                        position: "topRight",
                    });
                    return false;
                }
            }

            const data = {
                name: this.name, email: this.email, password: this.password, cpassword: this.cpassword, role: this.role,
            };
            const rawResponse = await fetch("/register/store", {
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
            console.log(content)
            try {
                if (content.errors.email.length > 0) {
                    for (let i = 0; i < content.errors.email.length; i++) {
                        iziToast.error({
                            iconUrl: "/assets/error.png",
                            title: "Register Error",
                            message: content.errors.email[i],
                            position: "topRight",
                        });
                    }
                    return false;
                }
            } catch (error) {
                iziToast.success({
                    iconUrl: "/assets/check.png",
                    title: "Register Success",
                    message: "You have been registered.",
                    position: "bottomLeft",
                });
                this.name = "";
                this.email = "";
                this.password = "";
                this.cpassword = "";
                this.role = "";
            }

            //Backend Validation
            // try {
            //     if (content.errors.name.length > 0) {
            //         for (let i = 0; i < content.errors.name.length; i++) {
            //             iziToast.error({
            // iconUrl: "/assets/error.png",
            //                 title: "Register Error",
            //                 message: content.errors.name[i],
            //                 position: "topRight",
            //             });
            //         }
            //     }
            // } catch (error) {
            //     try {
            //         if (content.errors.email.length > 0) {
            //             for (let i = 0; i < content.errors.email.length; i++) {
            //                 iziToast.error({
            // iconUrl: "/assets/error.png",
            //                     title: "Register Error",
            //                     message: content.errors.email[i],
            //                     position: "topRight",
            //                 });
            //             }
            //         }
            //     } catch (error) {
            //         iziToast.success
            //             iconUrl: "/assets/check.png",
            //             title: "Register Success",
            //             message: "You have been registered.",
            //             position: "bottomLeft",
            //         });

            //     }
            // }
        },
    },
    mounted() {
        this.getData();
    },
};

//Jquery
// $(document).ready(function () {
//     $('.register').click(function () {
//         const name = $('.form-name').val();
//         const email = $('.form-email').val();
//         const password = $('.form-password').val();
//         const cpassword = $('.form-cpassword').val();
//         const role = $('.form-role').val();

//         $.ajax({
//             type: "post",
//             url: '/register/store',
//             data: {
//                 _token: $('meta[name="csrf-token"]').attr("content"),
//                 name: name,
//                 email: email,
//                 password: password,
//                 cpassword: cpassword,
//                 role: role
//             },
//             success: function (data) {
//                 alert(data);
//             }
//         });
//     });
// })
</script>
