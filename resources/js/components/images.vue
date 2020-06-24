<template>
    <div>
        <img
            v-for="(image, idx) in images"
            :key="idx"
            :src="image.thumbUrl"
            @click="showImage(idx)"
            :alt="image.caption"
            :title="image.caption"
        />
        <ImageBox
            :images="images"
            :index="index"
            @close="index = null"
            :bgcolor="bgcolor"
        ></ImageBox>
    </div>
</template>

<script>
    import ImageBox from "vue-image-box";

    export default {
        name: "app",
        components: {
            ImageBox
        },
        methods: {
            showImage: function(idx) {
                this.index = idx;
            }
        },
        data() {
            return {
                index: null,
                bgcolor: "rgba(51, 51, 51, .9)",
                images: [
                    {
                        imageUrl: "https://placekitten.com/800/600",
                        thumbUrl: "https://placekitten.com/800/600",
                        caption: "kitten #1"
                    },
                    {
                        imageUrl: "https://placekitten.com/825/600",
                        thumbUrl: "https://placekitten.com/825/600",
                        caption: "kitten #2"
                    },
                    {
                        imageUrl: "https://placekitten.com/803/600",
                        thumbUrl: "https://placekitten.com/803/600",
                        caption: "kitten #3"
                    }
                ]
            };
        }
    };
</script>

<style scoped>
    img{
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        width: 150px;
    }

</style>
