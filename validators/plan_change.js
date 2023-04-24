$("#plan_change").validate({
    rules: {
        name: {
            required: true
        },
        price: {
            required: true,
        },
        space: {
            required: true,
        },
        bandwidth: {
            required: true
        },
        websites: {
            required: true
        },
        customization: {
            required: true
        },
        integration: {
            required: true
        },
        support: {
            required: true
        }

    }});