<template>
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Goods Request List</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-lg-12">
                        <button type="button" data-toggle="modal" data-target=".bd-example-modal-lg"
                                class="btn btn-primary float-right">
                            <i class="fa fa-plus-circle"></i> Requesting
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product</th>
                            <th>Name | NIK</th>
                            <th>Location</th>
                            <th>Unit Type</th>
                            <th>Quantity</th>
                            <th>Type</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-show="goodsRequestData.length == 0">
                            <td colspan="10" class="text-center">
                                Empty Deposit
                            </td>
                        </tr>
                        <tr v-for="(deposit, key) in goodsRequestData">
                            <td><strong>{{ key+1 }}</strong></td>
                            <td>{{ deposit.product.title }}</td>
                            <td>{{ deposit.user_request.name }} | {{ deposit.user_request.nik }}</td>
                            <td>{{ deposit.product.location }}</td>
                            <td>{{ deposit.product.unit_type }}</td>
                            <td>{{ deposit.type == 'in' ? '+'+deposit.quantity : '-'+deposit.quantity }}</td>
                            <td>{{ deposit.type }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="
                min-width: 90%;
            ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Goods Request</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="NIK" class="col-form-label">NIK:</label>
                                        <v-select :options="userSelecteds" @input="userRequestSelected"></v-select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="Name" class="col-form-label">Name:</label>
                                        <input type="text" class="form-control" v-model="nameSelected" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="Department" class="col-form-label">Department:</label>
                                        <input type="text" class="form-control" v-model="departmentSelected" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="Request Date" class="col-form-label">Request Date:</label>
                                        <input type="date" class="form-control" v-model="requestDate">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4"></div>
                                <div class="col-lg-4 col-md-4"></div>
                            </div>

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Location</th>
                                    <th>Stock</th>
                                    <th>Quantity</th>
                                    <th>Unit Type</th>
                                    <th>Note</th>
                                    <th>Status</th>
                                    <th>*</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-show="goodsRequestData.length == 0">
                                    <td colspan="10" class="text-center">
                                        Empty Deposit
                                    </td>
                                </tr>
                                <tr v-for="(rData, key) in requestData">
                                    <td><strong>{{ 1 }}</strong></td>
                                    <td width="25%">
                                        <v-select :options="productSelecteds" @input="onHandleProductSelected($event, key)"></v-select>
                                        <!--<Select2 v-model="rData.product" :options="productSelecteds" :settings="{ settingOption: value }" @select="onHandleProductSelected($event, key)" />-->
                                    </td>
                                    <td>
                                        <input v-model="rData.location" type="text" class="form-control" disabled>
                                    </td>
                                    <td>
                                        <input v-model="rData.stock" type="text" class="form-control" disabled>
                                    </td>
                                    <td>
                                        <input v-model="rData.quantity" type="text" @keyup="onHandleQuantityChange(key)" class="form-control">
                                    </td>
                                    <td>
                                        <input v-model="rData.unit_type" type="text" class="form-control" disabled>
                                    </td>
                                    <td>
                                        <input v-model="rData.note" type="text" class="form-control">
                                    </td>
                                    <td>
                                        <span>{{ rData.status }}</span>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" @click="removeRequest(key)">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="9" class="text-right">
                                        <button type="button" class="btn btn-success" @click="addRequest">
                                            <i class="fa fa-plus"></i> Add
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="pb-4 text-center">
                        <button type="button" class="btn btn-primary" @click="onHandleSubmit">Process</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Dashboard',
        data() {
            return {
                goodsRequestData:[],
                requestData: [
                    {
                        product: "",
                        location: "",
                        stock: 0,
                        quantity: 0,
                        unit_type:'',
                        note: '',
                        status: ''
                    }
                ],
                userRequests:[],
                userSelected: '',
                userSelecteds: [],
                requestDate:'',

                nameSelected:'',
                departmentSelected:'',
                products:[],
                productSelecteds:[]
            }
        },
        mounted() {

            this.$store.dispatch('setLoading', true)
            this.$axios.get('/api/goods-request').then((res) => {
                this.$store.dispatch('setLoading', false)
                this.goodsRequestData = res.product_histories

                this.userRequests = res.user_requests
                this.userRequests.map((dat) => {
                    this.userSelecteds.push({code: dat.id, label: dat.nik})
                })

                this.products = res.products
                this.products.map((dat) => {
                    this.productSelecteds.push({code: dat.id, label: dat.code + ' | ' +dat.title})
                })
            }).catch((error) => {
                this.$store.dispatch('setLoading', false)
                console.log(error)
            })
        },
        methods: {
            addRequest() {
                this.requestData.push({
                    product: "",
                    location: "",
                    stock: 0,
                    quantity: 0,
                    unit_type:'',
                    note: '',
                    status: ''
                })
            },
            removeRequest(index) {
                let confirmVal = confirm("Are you sure to delete this?")
                if (confirmVal == true) {
                    this.requestData.splice(index, 1);
                }
            },
            userRequestSelected(value){
                let id = value.code
                var result = this.userRequests.filter(obj => {
                    return obj.id == id
                })
                this.nameSelected = result[0].name;
                this.departmentSelected = result[0].department;
            },
            onHandleProductSelected(value, key){
                let id = value.code
                var result = this.products.filter(obj => {
                    return obj.id == id
                })
                this.requestData[key].location = result[0].location
                this.requestData[key].stock = result[0].stock_quantity
                this.requestData[key].unit_type = result[0].unit_type
            },
            onHandleQuantityChange(key) {
                let quantity = this.requestData[key].quantity
                let stock = this.requestData[key].stock
                if (stock == 0) {
                    this.requestData[key].status = 'Out of Stock'
                    this.$toast.error('Out of stock', {
                        position: 'top-right',
                        duration: 3000
                    })
                    console.log('Out of Stock')
                    return ''
                }
                if (quantity > stock) {
                    this.requestData[key].status = 'full of stock'
                    console.log('Full of Stock')
                    return ''
                }
                if (quantity < stock) {
                    this.requestData[key].status = 'half of stock'
                    console.log('half of Stock')
                    return ''
                }
            },
            onHandleSubmit() {
                if (this.userSelected == '') {
                    this.$toast.error('Please select nik first', {
                        position: 'top-right',
                        duration: 3000
                    })
                    return
                }
                if (this.requestDate == '') {
                    this.$toast.error('Please choose the request date', {
                        position: 'top-right',
                        duration: 3000
                    })
                    return
                }

                this.requestData.map((data) => {
                    if (data.product == '') {
                        this.$toast.error('Please select product', {
                            position: 'top-right',
                            duration: 3000
                        })
                        return
                    }
                    if (data.quantity == 0) {
                        this.$toast.error('Please add quantity', {
                            position: 'top-right',
                            duration: 3000
                        })
                        return
                    }
                    if (data.stock == 0) {
                        this.$toast.error('The product is out of stock', {
                            position: 'top-right',
                            duration: 3000
                        })
                        return
                    }
                    if (data.quantity > data.stock) {
                        this.$toast.error('Please fill the quantity less or same with stock', {
                            position: 'top-right',
                            duration: 3000
                        })
                        return
                    }
                });
                this.$store.dispatch('setLoading', true)

                this.$axios.post('/api/goods-request', {
                    "user_selected":this.userSelected,
                    "data":this.requestData
                }).then((res) => {
                    this.$store.dispatch('setLoading', false)
                    if (res.status == false) {
                        this.$toast.error(res.message, {
                            position: 'top-right',
                            duration: 3000
                        })
                        return
                    }
                    this.$toast.success(res.message, {
                        position: 'top-right',
                        duration: 3000
                    })
                    window.location.reload(true)
                }).catch((error) => {
                    this.$store.dispatch('setLoading', false)
                    console.log(error)
                })
            }
        }
    }
</script>