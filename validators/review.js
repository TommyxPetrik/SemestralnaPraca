$("#reviewform").validate({
    rules: {
        name: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        msg: {
            required: true
        }
    }});