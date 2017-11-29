<template lang="html">
    <div class="">
        <input type="hidden" name="questions" v-bind:value="questions()">
        <div class="form-group">
            <label for="number-questions" class="control-label">Number of questions for lesson</label>
            <select v-model="selected">
                <option v-for="option in options" v-bind:value="option.value">
                    {{ option.text }}
                </option>
            </select>
        </div>

        <div class="form-group" v-for="i in selected">
            <label for="question" class="control-label">Question {{i}}</label>
            <input name="question" class="form-control" type="text" v-model="question">

            <label for="answer" class="control-label">Answer for {{i}}</label>
            <input name="answer" class="form-control" type="text" v-model="answer">
        </div>
    </div>

</template>

<script>
export default {
    data () {
        return {
            selected: 1,


            question: '',
            answer: '',


            options: [
                { text: 'One', value: 1 },
                { text: 'Two', value: 2 },
                { text: 'Three', value: 3 },
                { text: 'Four', value: 4},
                { text: 'Five', value: 5},
                { text: 'Six', value: 6},
                { text: 'Seven', value: 7},
                { text: 'Eight', value: 8},
                { text: 'Nine', value: 9},
                { text: 'Ten', value: 10},
            ],
        }
    },


    props : [

    ],

    created () {},


    ready () {

    },

    methods : {
        questions: function () {
            return [this.question,this.answer]
        }
    },
}
</script>

<style>

</style>
