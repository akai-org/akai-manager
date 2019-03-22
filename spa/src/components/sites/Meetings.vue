<template>
    <div class="events">
        <!-- Page Heading -->
        <div class="d-flex">
            <div>
                <h1 class="h3 mb-2 text-gray-800">Spotkania</h1>
                <p class="mb-4">Lista wszystkich spotkań koła</p>
            </div>
            <div class="ml-auto">
                <router-link :to="{ name: 'MeetingCreate' }"
                             class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-50"></i> Stwórz nowe
                </router-link>
            </div>
        </div>


        <!-- DataTales Example -->
        <div class="table-responsive overflow-hidden">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="dataTable_length"><label>Paginacja: <select
                                name="dataTable_length" aria-controls="dataTable"
                                class="custom-select custom-select-sm form-control form-control-sm"
                                v-model="pagination">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select></label></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%"
                               cellspacing="0" role="grid" aria-describedby="dataTable_info"
                               style="width: 100%;">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending"
                                    style="width: 223px;">#
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                    style="width: 334px;">Miejsce
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                    style="width: 164px;">Rozpoczęcie
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                    colspan="1" aria-label="Age: activate to sort column ascending"
                                    style="width: 79px;">Zakończenie
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                    colspan="1" aria-label="Start date: activate to sort column ascending"
                                    style="width: 153px;">Status
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                    colspan="1" aria-label="Salary: activate to sort column ascending"
                                    style="width: 140px;">
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr role="row" class="odd" v-for="meeting in meetings">
                                <td class="sorting_1">{{meeting.id}}</td>
                                <td>{{meeting.place}}</td>
                                <td>{{meeting.starts_at}}</td>
                                <td>{{meeting.ends_at}}</td>
                                <td>{{meeting.status}}</td>
                                <td class="text-right">
                                    <a href="#" @click="goToEdit(meeting.id)">
                                        <i class="fas fa-pen mx-1"></i>
                                    </a>
                                    <a href="#" @click="prompDelete(meeting.id)">
                                        <i class="fas fa-trash mx-1 text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-7 offset-md-5">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous"
                                    :class="{disabled: !isTherePreviousPage()}"
                                    id="dataTable_previous"><a href=""
                                                               @click="gotoPreviousPage"
                                                               class="page-link">Previous</a></li>
                                <li class="paginate_button page-item" v-for="index in paginationData.last_page"
                                    :class="{active: isCurrentPage(index)}"><a href="#"
                                                                               @click="setCurrentPage(index)"
                                                                               class="page-link">{{index}}</a></li>
                                <li class="paginate_button page-item next" id="dataTable_next"
                                    :class="{disabled: !isThereNextPage()}">
                                    <a href=""
                                       @click="gotoNextPage"
                                       class="page-link">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Meetings",
        data() {
            return {
                meetings: null,
                pagination: 10,
                paginationData: {
                    last_page: 1
                },
                currentPage: 1,
                uri: '/meetings'
            }
        },
        methods: {
            getData() {
                let readyRequestUri = this.uri + '?pagination=' + this.pagination + "&page=" + this.currentPage;
                window.mainApiInstance.request({
                    url: readyRequestUri,
                    method: 'GET',
                }).then(response => {
                    this.meetings = response.data.data.meetings;
                    this.paginationData = response.data.pagination;
                }).catch(error => {
                    this.$parent.dumpErrors(error.response.data.error.errors)
                })
            },
            isCurrentPage(index) {
                return index === parseInt(this.paginationData.current_page_number);
            },
            setCurrentPage(index) {
                this.currentPage = index;
            },
            gotoPreviousPage(e) {
                e.preventDefault();
                this.currentPage = this.paginationData.previous_page
            },
            gotoNextPage(e) {
                e.preventDefault();
                this.currentPage = this.paginationData.next_page
            },
            goToEdit(id) {

            },
            promptDelete(id) {

            },
            isThereNextPage() {
                return !isNaN(this.paginationData.next_page);
            },
            isTherePreviousPage() {
                return !isNaN(this.paginationData.previous_page);
            }
        },
        mounted() {
            this.getData();
        },
        watch: {
            pagination() {
                this.getData();
            },
            currentPage() {
                this.getData();
            }
        }
    }
</script>

<style scoped>

</style>