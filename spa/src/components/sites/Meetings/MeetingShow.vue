<template>
    <div class="meeting-show" v-if="meeting">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Spotkanie {{meeting.starts_at}}</h1>
        <p class="mb-4">Szczegóły dotyczące spotkania dnia ... w ...</p>

        <!-- Content Row -->
        <div class="row">

            <div class="col-12 col-lg-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold">Frekwencja</h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <div ref="frequencyChart">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold">Agenda</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>temat</th>
                                <th>opis</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h5 class="m-0 font-weight-bold">Notatki</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>treść</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>...</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h5 class="m-0 font-weight-bold">Statystyki</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Liczba obecnych:</th>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th>Sprawdzonych projektów:</th>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th>Zaktualizowanych projektów:</th>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th>Nowych projektów:</th>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th>Nowych członków:</th>
                                <td>...</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h5 class="m-0 font-weight-bold">Obecni</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>...avatar...</th>
                                <td>Imię, nazwisko, mail</td>
                            </tr>
                            <tr>
                                <th>...avatar...</th>
                                <td>Imię, nazwisko, mail</td>
                            </tr>
                            <tr>
                                <th>...avatar...</th>
                                <td>Imię, nazwisko, mail</td>
                            </tr>
                            <tr>
                                <th>...avatar...</th>
                                <td>Imię, nazwisko, mail</td>
                            </tr>
                            <tr>
                                <th>...avatar...</th>
                                <td>Imię, nazwisko, mail</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>

        </div>

    </div>
</template>

<script>
/*eslint-disable*/
    export default {
        name: "MeetingShow",
        props: ['id'],
        data() {
            return {
                meeting: null,
                uri: '/meetings'
            }
        },
        methods: {
            displayIncoming() {

            },
            displayStarted() {
                this.setFrequencyChart()
            },
            seedFrequencyChart() {
                var container = this.$refs.frequencyChart;
                var data = {
                    categories: ['a', 'b', 'c', 'd', 'e'],
                    series: [
                        {
                            name: 'Frekwencja',
                            data: [5, 12, 7, 4, 13]
                        },
                    ]
                };
                var options = {
                    chart: {
                        width: 1160,
                        height: 350,
                        title: 'Frekwencja w porwónaniu z ostatnimi spotkaniami'
                    },
                    yAxis: {
                        title: 'Osób',
                    },
                    xAxis: {
                        title: 'Spotkanie',
                        pointOnColumn: true,
                    },
                    series: {
                        showDot: true,
                        zoomable: false,
                        spline: true
                    },
                    tooltip: {
                        suffix: 'osób'
                    },
                };
                container.setAttribute("style", `height: ${options.chart.height}px`)
                chart.lineChart(container, data, options);
            }
        },
        mounted() {
            let readyRequestUri = this.uri + '/' + this.id;
            window.mainApiInstance.request({
                url: readyRequestUri,
                method: 'GET',
            }).then(response => {
                this.meeting = response.data.data.meeting;
                if(this.meeting.status === 'Nadchodzi') {
                    this.displayIncoming();
                } else {
                    this.displayStarted();
                }
            }).catch(error => {
                this.$parent.dumpErrors(error.response.data.error.errors)
            })
        }
    }
</script>

<style scoped>

</style>