<template>
    <div class="meeting-agenda-editor">
        <div class="card rounded my-1" v-for="(point, key) in agendaPoints">
            <input v-if="point.order" type="hidden" :name="'agenda['+key+'][order]'">
            <table>
                <tr class="d-flex">
                    <th class="p-2 px-3 bg-dark text-white rounded">{{key+1}}</th>
                    <th class="p-2 pl-4 d-flex">
                        <input type="text" v-model="point.title" class="border-0">
                    </th>
                    <td class="w-75">
                        <textarea class="border-0 w-100" v-model="point.content"></textarea>
                    </td>
                    <td class="ml-auto">
                        <div class="options-sack p-1">
                            <div class="option danger ml-auto small" @click="deletePoint(key)">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="options-sack border-top">
            <div class="option success ml-auto" @click="addPoint">
                <i class="fas fa-plus"></i>
            </div>
        </div>
    </div>
</template>

<script>
/*eslint-disable*/
    export default {
        name: "MeetingAgendaEditor",
        props: {
            currentPoints: {
                type: Array,
                default: () => {
                    return []
                }
            }
        },
        data() {
            return {
                agendaPoints: this.currentPoints
            }
        },
        methods: {
            deletePoint(id) {
                console.log(id);
                this.agendaPoints.splice(id, 1)
                console.log(this.agendaPoints)
            },
            addPoint() {
                let newPoint = {
                    title: "",
                    content: "",
                    order:this.currentPoints.length + 1
                };
                this.agendaPoints.push(newPoint)
            }
        },
        watch: {
            agendaPoints() {
                this.$emit("dataChanged", this.currentPoints);
            }
        }
    }
</script>

<style scoped>

</style>