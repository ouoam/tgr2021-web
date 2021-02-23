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
            <label for="qty">Qty</label>
            <input type="number" class="form-control" id="qty" name="qty" placeholder="qty" v-model="qty">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>
<script>
    export default {
        props: ['init_qty', 'init_name', 'kinds'],
        data: function () {
            return {
                qty: this.init_qty,
                name: this.init_name
            }
        }
    }
</script>