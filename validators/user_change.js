$("#user_change").validate({
    rules: {
        id: {
            required: true,
        },
        name: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        trial: {
            required: true,
        },
        plan: {
            required: true
        },
        country: {
            required: true
        }

    }});