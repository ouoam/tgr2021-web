<template>
    <form class="form-inline" method="get" id="myForm">
        <div class="form-group">
            <label for="name">Name</label>
            <select class="form-control" id="name" name="name">
                <option value=""></option>
                <option v-for="kind in kinds" :key="kind" :value="kind" :selected="name==kind">
                    {{ kind }}
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="date_gt">date_gt</label>
            <datetime class="form-control" id="date_gt" type="datetime" v-model="date_gt" format="yyyy-MM-dd HH:mm:ss" value-zone="Asia/Bangkok"
  zone="Asia/Bangkok"></datetime>
            <input name="created_at[gt]" style="display: none;" v-model="date_gt">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" @click="date_gt = ''">X</button>
            </div>
        </div>
        <div class="form-group">
            <label for="date_lt">date_lt</label>
            <datetime class="form-control" id="date_lt" type="datetime" v-model="date_lt" format="yyyy-MM-dd HH:mm:ss" value-zone="Asia/Bangkok"
  zone="Asia/Bangkok"></datetime>
            <input name="created_at[lt]" style="display: none;" v-model="date_lt">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" @click="date_lt = ''">X</button>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>
<script>
    export default {
        props: ['init_name', 'init_date_gt', 'init_date_lt', 'kinds'],
        data: function () {
            return {
                name: this.init_name,
                date_gt: this.init_date_gt,
                date_lt: this.init_date_lt
            }
        }
    }
</script>