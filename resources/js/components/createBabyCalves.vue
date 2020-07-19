<template>
    <a href="{{route('animals.create')}}" class="btn btn-sm btn-success" id="createBabyCalves">Cadastrar Bezerro</a>
</template>

<script>
    export default {
        mounted() {
            alert('okkkkk');
            // if ($("#createBabyCalves").clicked == true) {
            //     $("createBabyCalves").hide();
            // }
        }
    }
</script>
