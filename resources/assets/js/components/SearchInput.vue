<template>
    <basic-select :options="options"
                  :selected-option="item"
                  placeholder="Find users"
                  @select="onSelect">
    </basic-select>
</template>

<script>
    import { BasicSelect } from 'vue-search-select';

    export default {
        props: {useroptions: Array},
        data () {
            return {
                options: this.useroptions,
                searchText: '', // If value is falsy, reset searchText & searchItem
                item: {
                    value: '',
                    text: ''
                }
            }
        },
        methods: {
            onSelect (item) {
                this.item = item;
                window.location.replace('/profile/' + this.item.value);
            },
            reset () {
                this.item = {}
            },
            selectOption () {
                // select option from parent component
                this.item = this.options[0]
            }
        },
        components: {
            BasicSelect
        }
    }
</script>