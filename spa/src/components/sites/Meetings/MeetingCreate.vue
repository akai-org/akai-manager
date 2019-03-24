<template>
    <div class="meeting-create">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center  mb-4">
            <div class="previous-page mr-4">
                <router-link :to="{ name: 'Meetings' }">
                    <i class="fa fa-arrow-circle-left text-primary glyphicon-text-size"></i>
                </router-link>
            </div>
            <h1 class="h3 mb-0 text-gray-800">Nowe spotkanie</h1>
        </div>
        <form ref="form" @submit="createMeeting">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Podstawowe informacje</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="place">Miejsce spotkania</label>
                                    <input type="text" class="form-control" id="place" placeholder="np.: L125BT"
                                           required v-model="place">
                                    <div class="invalid-feedback">
                                        Podanie miejsca spotkania jest wymagane.
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="starts_at">Data i godzina spotkania</label>
                                    <input type="datetime-local" class="form-control" id="starts_at" required
                                           v-model="startsAt">
                                    <div class="invalid-feedback">
                                        Podanie czasu spotkania jest wymagane.
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="duration">Czas trwania</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="duration" placeholder="90"
                                               required v-model="duration">
                                        <div class="input-group-append">
                                            <span class="input-group-text">min <small
                                                    class="mx-1">({{endTimeForView}})</small></span>
                                        </div>
                                        <div class="invalid-feedback" style="width: 100%;">
                                            Your username is required.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-3 d-flex">
                                    <input type="submit" class="btn btn-primary ml-auto" value="Stwórz">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="card shadow mb-4">
                        <a href="#agendaCardCollapse" class="d-block card-header py-3" data-toggle="collapse"
                           role="button" aria-expanded="false" aria-controls="agendaCardCollapse">
                            <h6 class="m-0 font-weight-bold text-primary">Agenda</h6>
                        </a>
                        <div class="collapse show" id="agendaCardCollapse">
                            <div class="card-body">
                                <meeting-agenda-editor></meeting-agenda-editor>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </form>

    </div>
</template>

<script>
    /*eslint-disable*/
    import MeetingAgendaEditor from '../../tools/MeetingAgendaEditor';
    export default {
        name: "MeetingCreate",
        components: {
            MeetingAgendaEditor
        },
        data() {
            return {
                meetingsStoreRoute: 'meetings',
                startsAt: null,
                place: null,
                duration: null
            }
        },
        methods: {
            createMeeting: function () {
                window.mainApiInstance.request({
                    url: '/meetings',
                    method: 'POST',
                    data: {
                        place: this.place,
                        starts_at: this.startsAt,
                        ends_at: this.endTimeForRequest
                    }
                }).then(response => {
                    this.$parent.dumpSuccess(response.data.message)
                }).catch(error => {
                    this.$parent.dumpErrors(error.response.data.error.errors)
                })
            }
        },
        computed: {
            endTimeForRequest: function () {
                if (this.duration != null && this.startsAt != null) {
                    return moment(this.startsAt).add(this.duration, 'm').format("YYYY-MM-DDTHH:mm")
                }
            },
            endTimeForView: function () {
                if (this.duration != null && this.startsAt != null) {
                    return moment(this.startsAt).add(this.duration, 'm').format("HH:mm")
                }
            }
        }
    }
</script>

<style scoped>

</style>