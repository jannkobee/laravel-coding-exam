<template>
    <div class="modal fade" id="addRole" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Role</h5>
                    <button ref="Close" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="w-auto mb-3">
                        <label for="addRole_roleName" class="form-label">Role Name</label>
                        <input id="addRole_roleName" class="form-control" v-model="addRole_roleName" />
                    </div>
                    <div class="w-auto mb-3">
                        <label for="addRole_roleDesc" class="form-label">Description</label>
                        <textarea id="addRole_roleDesc" class="form-control" rows="3"
                            v-model="addRole_roleDesc"></textarea>
                    </div>
                </div>
                <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-light" @click="addRole">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modifyRole" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Modify Role</h5>
                    <button ref="Close1" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="w-auto mb-3">
                        <label for="addRole_roleName1" class="form-label">Role Name</label>
                        <input id="addRole_roleName1" class="form-control" v-model="addRole_roleName" />
                    </div>
                    <div class="w-auto mb-3">
                        <label for="addRole_roleDesc1" class="form-label">Description</label>
                        <textarea id="addRole_roleDesc1" class="form-control" rows="3"
                            v-model="addRole_roleDesc"></textarea>
                    </div>
                </div>
                <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-light" @click="updateRole">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Add User</h5>
                    <button ref="Close2" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="w-auto mb-3">
                        <label for="addUser_Name" class="form-label">Full Name</label>
                        <input id="addUser_Name" class="form-control" v-model="addUser_Name" />
                    </div>
                    <div class="w-auto mb-3">
                        <label for="addUser_Email" class="form-label">Email</label>
                        <input id="addUser_Email" type="email" class="form-control" v-model="addUser_Email" />
                    </div>
                    <div class="w-auto mb-3">
                        <label for="addUser_Password" class="form-label">Nominated Password</label>
                        <input id="addUser_Password" type="password" class="form-control" v-model="addUser_Password" />
                    </div>
                    <div class="w-auto mb-3">
                        <label for="addUser_Cpassword" class="form-label">Confirmed Password</label>
                        <input id="addUser_Cpassword" type="password" class="form-control"
                            v-model="addUser_Cpassword" />
                    </div>
                    <div class="w-auto mb-3">
                        <label for="" class="form-label">Role</label>
                        <select class="form-control w-100" v-model="addUser_Role">
                            <option v-for="role in roles" :value="role.id">
                                {{ role.rolename }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-light" @click="addUser">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modifyUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Modify User</h5>
                    <button ref="Close3" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="w-auto mb-3">
                        <label for="addUser_Name1" class="form-label">Full Name</label>
                        <input id="addUser_Name1" class="form-control" v-model="addUser_Name" />
                    </div>
                    <div class="w-auto mb-3">
                        <label for="addUser_Email1" class="form-label">Email</label>
                        <input id="addUser_Email1" type="email" class="form-control" v-model="addUser_Email" />
                    </div>
                    <div class="w-auto mb-3">
                        <label for="" class="form-label">Role</label>
                        <select class="form-control w-100" v-model="addUser_Role">
                            <option v-for="role in roles" :value="role.id">
                                {{ role.rolename }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-light" @click="updateUser">Save</button>
                </div>
            </div>
        </div>
    </div>

    <h1 class="p-5 text-center">Laravel Coding Exam</h1>
    <div class="d-flex align-items-center justify-content-center flex-column p-2">
        <h2 class="mb-3" v-html="name"></h2>
        <a href="/dashboard/logout"><button class="btn btn-dark">Logout</button></a>
    </div>
    <div class="d-flex align-items-center justify-content-center flex-column p-5">
        <div class="d-flex justify-content-between w-100">
            <h2>Role CRUD</h2>
            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addRole" @click="unassignRole">Add
                Role</button>
        </div>
        <div style="max-height: 320px; overflow-x: hidden; overflow-y: auto;" class="w-100">
            <table class="table table-dark table-bordered border-light">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Role Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="role in roles">
                        <th>{{ role.id }}</th>
                        <td>{{ role.rolename }}</td>
                        <td>{{ role.description }}</td>
                        <td>
                            <button v-on:click="assignRole(role.id, role.rolename, role.description)"
                                class="btn btn-info me-1" data-bs-toggle="modal"
                                data-bs-target="#modifyRole">Modify</button>
                            <button v-on:click="assignDeleteRole(role.id, role.rolename, role.description)"
                                class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex align-items-center justify-content-center flex-column p-5">
        <div class="d-flex justify-content-between w-100">
            <h2>User CRUD</h2>
            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addUser" @click="unassignUser">Add
                User</button>
        </div>
        <div style="max-height: 320px; overflow-x: hidden; overflow-y: auto;" class="w-100">
            <table class="table table-dark table-bordered border-light">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users">
                        <th>{{ user.id }}</th>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.rolename }}</td>
                        <td>
                            <button v-on:click="assignUser(user.id, user.name, user.email, user.rolename)"
                                class="btn btn-info me-1" data-bs-toggle="modal"
                                data-bs-target="#modifyUser">Modify</button>
                            <button v-if="user.id != this.id"
                                v-on:click="assignDeleteUser(user.id, user.name, user.email, user.rolename)"
                                class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
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
            id: "",
            users: [],
            roles: [],
            addRole_roleId: "",
            addRole_roleName: "",
            addRole_roleDesc: "",
            addUser_Id: "",
            addUser_Name: "",
            addUser_Email: "",
            addUser_Password: "",
            addUser_Cpassword: "",
            addUser_Role: "",
            modifyRole_roleName: "",
            modifyUser_Name: "",
            modifyUser_Email: "",
        };
    },
    methods: {
        async postRequest(data, url) {
            const rawResponse = await fetch(url, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                    Accept: "application/json",
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(data)
            });
            const content = await rawResponse.json();

            return content;
        },

        async getRequest(url) {
            const rawResponse = await fetch(url, {
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                    Accept: "application/json",
                    "Content-Type": "application/json",
                }
            });
            const content = await rawResponse.json();

            return content;
        },

        async populate() {
            const userData = await this.getData();
            const systemData = await this.getAllData();
            if (userData != true && systemData != true) {
                iziToast.error({
                    iconUrl: "/assets/error.png",
                    title: "Error",
                    message: "There seems to be a problem. Please check your Database Connection",
                    position: "bottomLeft",
                });
            } else {
                iziToast.success({
                    iconUrl: "/assets/check.png",
                    title: "Success",
                    message: "GET Data Success",
                    position: "bottomLeft",
                    timeout: 3000,
                });
            }
        },

        async getData() {
            try {
                const url = "/dashboard/getData";

                const content = await this.getRequest(url);
                if (content.length > 0) {
                    this.name = content[0]["name"];
                    this.id = content[0]["id"];
                    console.log(content)
                    return true;
                }

            } catch (error) {
                return false;
            }
        },

        async getAllData() {
            try {
                const url = "/dashboard/getAllData";

                const content = await this.getRequest(url);

                console.log(content);

                if (content[0].length > 0 && content[1].length > 0) {
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

        async addRole() {
            for (let i = 0; i < this.roles.length; i++) {
                if (this.addRole_roleName.toLowerCase() == this.roles[i]["rolename"].toLowerCase()) {
                    iziToast.error({
                        iconUrl: "/assets/error.png",
                        title: "Add Role Error",
                        message: "Role Name is already taken.",
                        position: "topRight",
                    });
                    return false;
                }
            }

            if (this.addRole_roleName == "" || this.addRole_roleDesc == "") {
                iziToast.error({
                    iconUrl: "/assets/error.png",
                    title: "Error",
                    message: "Please fill out all input fields.",
                    position: "topRight",
                });
                return false;
            }

            const data = { name: this.addRole_roleName, description: this.addRole_roleDesc };
            const url = "/dashboard/storeRole";

            const content = await this.postRequest(data, url);
            console.log(content)

            if (content == 1) {
                console.log(content);
                iziToast.success({
                    iconUrl: "/assets/check.png",
                    title: "Success",
                    message: this.addRole_roleName + " role is now added.",
                    position: "bottomLeft",
                    timeout: 3000,
                });
                this.addRole_roleid = "";
                this.addRole_roleName = "";
                this.addRole_roleDesc = "";
                this.getAllData();
                this.$refs.Close.click();
            }
        },

        assignRole(id, name, description) {
            this.addRole_roleId = id;
            this.addRole_roleName = name;
            this.addRole_roleDesc = description;
            this.modifyRole_roleName = name;
        },

        unassignRole() {
            this.addRole_roleid = "";
            this.addRole_roleName = "";
            this.addRole_roleDesc = "";
        },

        async updateRole() {
            if (this.addRole_roleName == "" || this.addRole_roleDesc == "") {
                iziToast.error({
                    iconUrl: "/assets/error.png",
                    title: "Error",
                    message: "Please fill out all input fields.",
                    position: "topRight",
                });
                return false;
            }

            for (let i = 0; i < this.roles.length; i++) {
                if (this.addRole_roleName.toLowerCase() == this.roles[i]["rolename"].toLowerCase()) {
                    if (this.addRole_roleName.toLowerCase() != this.modifyRole_roleName.toLowerCase()) {
                        iziToast.error({
                            iconUrl: "/assets/error.png",
                            title: "Add Role Error",
                            message: "Role Name is already taken.",
                            position: "topRight",
                        });
                        return false;
                    }
                }
            }

            const data = { id: this.addRole_roleId, name: this.addRole_roleName, description: this.addRole_roleDesc };
            const url = "/dashboard/updateRole";

            const content = await this.postRequest(data, url);

            if (content == 1) {
                console.log(content);
                iziToast.success({
                    iconUrl: "/assets/check.png",
                    title: "Success",
                    message: this.addRole_roleName + " role is updated.",
                    position: "bottomLeft",
                    timeout: 3000,
                });
                this.addRole_roleId = "";
                this.addRole_roleName = "";
                this.addRole_roleDesc = "";
                this.getAllData();
                this.$refs.Close1.click();
            }
        },

        async deleteRole() {
            const data = { id: this.addRole_roleId };
            const url = "/dashboard/deleteRole";

            const content = await this.postRequest(data, url);

            if (content == 1) {
                console.log(content);
                iziToast.success({
                    iconUrl: "/assets/check.png",
                    title: "Success",
                    message: this.addRole_roleName + " role is now deleted.",
                    position: "bottomLeft",
                    timeout: 3000,
                });
                this.addRole_roleId = "";
                this.addRole_roleName = "";
                this.addRole_roleDesc = "";
                this.getAllData();
            }
        },

        assignDeleteRole(id, name, description) {
            this.addRole_roleId = id;
            this.addRole_roleName = name;
            this.addRole_roleDesc = description;

            iziToast.warning({
                iconUrl: "/assets/delete.png",
                layout: 1,
                timeout: false,
                close: false,
                closeOnEscape: true,
                overlayClose: true,
                overlay: true,
                toastOnce: true,
                id: 'question',
                title: 'Delete Role?',
                message: 'Are you sure you want to delete this role?',
                position: 'center',
                buttons: [
                    ['<button style="width: 50px;">Yes</button>', (instance, toast) => {
                        instance.hide({ transitionOut: 'flipOutX' }, toast, 'button');
                        this.deleteRole();
                    }],
                    ['<button style="width: 100px;"><b>Cancel</b></button>', (instance, toast) => {
                        instance.hide({ transitionOut: 'flipOutX' }, toast, 'button');
                    }]
                ]
            });
        },

        async addUser() {
            if (
                this.addUser_Name == "" ||
                this.addUser_Email == "" ||
                this.addUser_Password == "" ||
                this.addUser_Cpassword == "" ||
                this.addUser_Role == ""
            ) {
                iziToast.error({
                    iconUrl: "/assets/error.png",
                    title: "Add User Error",
                    message: "Please fill out all input fields.",
                    position: "topRight",
                });
                return false;
            }
            if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.addUser_Email)) {
                iziToast.error({
                    iconUrl: "/assets/error.png",
                    title: "Add User Error",
                    message: "Email is not valid.",
                    position: "topRight",
                });
                return false;
            }
            if (this.addUser_Password.length < 8) {
                iziToast.error({
                    iconUrl: "/assets/error.png",
                    title: "Add User Error",
                    message: "Password length must be 8 or more.",
                    position: "topRight",
                });
                return false;
            }
            if (this.addUser_Password != this.addUser_Cpassword) {
                iziToast.error({
                    iconUrl: "/assets/error.png",
                    title: "Add User Error",
                    message: "Password not matched.",
                    position: "topRight",
                });
                return false;
            }
            for (let i = 0; i < this.users.length; i++) {
                if (this.addUser_Name.toLowerCase() == this.users[i]["name"].toLowerCase()) {
                    iziToast.error({
                        iconUrl: "/assets/error.png",
                        title: "Add User Error",
                        message: "Name is already taken.",
                        position: "topRight",
                    });
                    return false;
                }
                if (this.addUser_Email.toLowerCase() == this.users[i]["email"].toLowerCase()) {
                    iziToast.error({
                        iconUrl: "/assets/error.png",
                        title: "Add User Error",
                        message: "Email is already taken.",
                        position: "topRight",
                    });
                    return false;
                }
            }

            const data = { id: this.addUser_Id, name: this.addUser_Name, email: this.addUser_Email, password: this.addUser_Password, cpassword: this.addUser_Cpassword, role: this.addUser_Role };
            const url = "/dashboard/storeUser";

            try {
                const content = await this.postRequest(data, url);

                if (content) {
                    console.log(content);
                    iziToast.success({
                        iconUrl: "/assets/check.png",
                        title: "Success",
                        message: this.addUser_Name + " account is now added.",
                        position: "bottomLeft",
                        timeout: 3000,
                    });
                    this.addUser_Id = "";
                    this.addUser_Name = "";
                    this.addUser_Email = "";
                    this.addUser_Password = "";
                    this.addUser_Cpassword = "";
                    this.addUser_Role = "";
                    this.getAllData();
                    this.$refs.Close2.click();
                }
            } catch (error) {
                iziToast.error({
                    iconUrl: "/assets/error.png",
                    title: "Error",
                    message: "There seems to be a problem.",
                    position: "bottomLeft",
                });
            }
        },

        assignUser(id, name, email, role) {
            this.addUser_Id = id;
            this.addUser_Name = name;
            this.addUser_Email = email;
            this.modifyUser_Name = name;
            this.modifyUser_Email = email;
            for (let i = 0; i < this.roles.length; i++) {
                if (this.roles[i]['rolename'] == role) {
                    this.addUser_Role = this.roles[i]['id'];
                }
            }
        },

        unassignUser() {
            this.addUser_Id = "";
            this.addUser_Name = "";
            this.addUser_Email = "";
            this.addUser_Role = "";
        },

        async updateUser() {
            if (this.addUser_Name == "" || this.addUser_Email == "" || this.addUser_Role == "") {
                iziToast.error({
                    iconUrl: "/assets/error.png",
                    title: "Error",
                    message: "Please fill out all input fields.",
                    position: "topRight",
                });
                return false;
            }

            for (let i = 0; i < this.users.length; i++) {
                if (this.addUser_Name.toLowerCase() == this.users[i]["name"].toLowerCase()) {
                    if (this.addUser_Name.toLowerCase() != this.modifyUser_Name.toLowerCase()) {
                        iziToast.error({
                            iconUrl: "/assets/error.png",
                            title: "Modify User Error",
                            message: "Name is already taken.",
                            position: "topRight",
                        });
                        return false;
                    }
                }

                if (this.addUser_Email.toLowerCase() == this.users[i]["email"].toLowerCase()) {
                    if (this.addUser_Email.toLowerCase() != this.modifyUser_Email.toLowerCase()) {
                        iziToast.error({
                            iconUrl: "/assets/error.png",
                            title: "Modify User Error",
                            message: "Email is already taken.",
                            position: "topRight",
                        });
                        return false;
                    }
                }
            }

            const data = { id: this.addUser_Id, name: this.addUser_Name, email: this.addUser_Email, role: this.addUser_Role };
            const url = "/dashboard/updateUser";

            const content = await this.postRequest(data, url);

            if (content == 1) {
                console.log(content);
                iziToast.success({
                    iconUrl: "/assets/check.png",
                    title: "Success",
                    message: this.addUser_Name + "'s information is updated.",
                    position: "bottomLeft",
                    timeout: 3000,
                });
                this.addUser_Id = "";
                this.addUser_Name = "";
                this.addUser_Email = "";
                this.addUser_Role = "";
                this.getAllData();
                this.$refs.Close3.click();
            }
        },

        async deleteUser() {
            const data = { id: this.addUser_Id };
            const url = "/dashboard/deleteUser";

            const content = await this.postRequest(data, url);

            if (content == 1) {
                console.log(content);
                iziToast.success({
                    iconUrl: "/assets/check.png",
                    title: "Success",
                    message: this.addUser_Name + "'s account is now deleted.",
                    position: "bottomLeft",
                    timeout: 3000,
                });
                this.addUser_Id = "";
                this.addUser_Name = "";
                this.addUser_Email = "";
                this.addUser_Role = "";
                this.getAllData();
            }
        },

        assignDeleteUser(id, name, email, role) {
            this.addUser_Id = id;
            this.addUser_Name = name;
            this.addUser_Email = email;
            for (let i = 0; i < this.roles.length; i++) {
                if (this.roles[i]['rolename'] == role) {
                    this.addUser_Role = this.roles[i]['id'];
                }
            }

            iziToast.warning({
                iconUrl: "/assets/delete.png",
                layout: 1,
                timeout: false,
                close: false,
                closeOnEscape: true,
                overlayClose: true,
                overlay: true,
                toastOnce: true,
                id: 'question',
                title: 'Delete User?',
                message: 'Are you sure you want to delete this user?',
                position: 'center',
                buttons: [
                    ['<button style="width: 50px;">Yes</button>', (instance, toast) => {
                        instance.hide({ transitionOut: 'flipOutX' }, toast, 'button');
                        this.deleteUser();
                    }],
                    ['<button style="width: 100px;"><b>Cancel</b></button>', (instance, toast) => {
                        instance.hide({ transitionOut: 'flipOutX' }, toast, 'button');
                    }]
                ]
            });
        },
    },
    mounted() {
        this.populate();
    },
};
</script>
