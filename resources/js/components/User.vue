<template>
    <div class="row">
        <div class="col-12">
           <div class="card">
                <div class="card-body">
                    <div class="m-t-10">
                        <div class="d-flex">
                            <div class="mr-auto">
                                <h4 class="card-title">Users List</h4>
                            </div>
                            <div class="ml-auto">
                                <button class="btn btn-success" @click="createNew()" href="javascript:void(0);">Create User <i class="fas fa-user-plus fa-fw"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="m-t-10">
                    </div>
                    <div class="table-responsive m-t-10">
                        <table class="table table-bordered table-striped" style="border: 1px solid #dee2e6;">
                            <thead>
                                <tr>
                                    <th>UUID</th>
                                    <th>NAME</th>
                                    <th>DESCRIPTION</th>
                                    <th>CODE</th>
                                    <th style="width:8%;">STATUS</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>

                            <tbody v-if="users">
                                <tr v-for="(user,index) in users.data" :key="index">
                                    <td>{{ user.uuid }}</td>
                                    <td>{{ user.name }}</td>
                                    <td>{{ user.description }}</td>
                                    <td>{{ user.code }}</td>
                                    <td v-if="user.status === 1">Active</td>
                                    <td v-if="user.status === 0">In-Active</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-success" @click="editModal(user)">Edit</button>
                                            <button class="btn btn-danger" @click="deleteUser(user.uuid)">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td align="center" colspan="6">No record found.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="float:right;" class="m-t-20">
                        <pagination align="center" :data="users" @pagination-change-page="list"></pagination>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal content -->
        <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add New User Info</h5>
                        <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update User Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form @submit.prevent="editmode ? updateUser() : createUser()">
                        <div class="modal-body">
                                <div class="form-group">
                                    <input v-model="form.name" type="text" name="name"
                                        placeholder="Name"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                        <div v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
                                </div>
                                <div class="form-group">
                                    <textarea v-model="form.description" name="description" id="description"
                                    placeholder="Description"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                                    <div v-if="form.errors.has('description')" v-html="form.errors.get('description')" />
                                </div>
                                <div class="form-group">
                                    <input v-model="form.code" type="text" name="code"
                                        placeholder="Code"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('code') }">
                                        <div v-if="form.errors.has('code')" v-html="form.errors.get('code')" />
                                </div>
                                <div class="form-group">
                                    <select name="status" v-model="form.status" id="status" class="form-control" :class="{ 'is-invalid': form.errors.has('status') }">
                                        <option value="">Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">In-Active</option>
                                    </select>
                                    <div v-if="form.errors.has('status')" v-html="form.errors.get('status')" />
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                            <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
 
<script>
    import pagination from 'laravel-vue-pagination';
    import Form from 'vform'
    export default {
        components:{
            pagination, Form
        },
        data() {
            return {
                editmode: false,
                users: {},
                form: new Form({
                    uuid : '',
                    name : '',
                    description : '',
                    code : '',
                    status : ''
                })
            }
        },
        methods:{
            loadUser() {
                this.axios
                    .get('api/frontend/')
                    .then(response => {
                        this.users = response.data;
                    });
            },
            // paginate to display values
            async list(page=1){
                await axios.get(`/api/frontend?page=${page}`).then(({data})=>{
                    this.users = data
                }).catch(({ response })=>{
                    console.error(response)
                })
            },
            // open new model
            createNew() {
                this.editmode = false;
                this.form.reset();
                $('#responsive-modal').modal('show');
            },
            // create a user
            createUser(){
                this.form.post('api/frontend')
                .then(()=>{
                    $('#responsive-modal').modal('hide');
                    Swal.fire({
                        title: 'Success!',
                        text: "User Successfully Created.",
                        showCancelButton: false,
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        this.loadUser();
                    })
                    
                })
                .catch(()=>{
                    Swal.fire({
                        title: 'Failed!',
                        text: "User info updation failed.",
                        confirmButtonText: 'OK'
                    });
                })
            },
            // edit modal open
            editModal(user){
                this.editmode = true;
                this.form.reset();
                $('#responsive-modal').modal('show');
                this.form.fill(user);
            },
            // update user info
            updateUser(){
                this.form.put('api/frontend/'+this.form.uuid)
                .then(() => {
                    $('#responsive-modal').modal('hide');
                     Swal.fire({
                        title: 'Success!',
                        text: "User Successfully Updated.",
                        showCancelButton: false,
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        this.loadUser();
                    })
                })
                .catch(() => {
                    Swal.fire({
                        title: 'Failed!',
                        text: "User info updation failed.",
                        confirmButtonText: 'OK'
                    });
                });

            },
            // remove user info
            deleteUser(id) { 
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {

                        // Send request to the server
                    if (result.value) {
                        axios.delete(`/api/frontend/${id}`)
                        .then(res => {
                            Swal.fire({
                                title: 'Deleted!',
                                text: "User Details Successfully Deleted.",
                                confirmButtonText: 'OK'
                                });

                            this.loadUser();
                        })
                        .catch(err => {
                            Swal.fire({
                                title: 'Failed!',
                                text: "User info deletion failed.",
                                confirmButtonText: 'OK'
                            });
                        })
                    }
                })
            }

        },
        created() {
           this.loadUser(); 
        },
    }
</script>