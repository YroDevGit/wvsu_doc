/*
 const form = document.getElementById('users'); // users is a form id <form id="users">

        form.addEventListener('submit', async (event) => {
            event.preventDefault(); // Prevent default form submission behavior

            const formData = new FormData(form);
            const data = Object.fromEntries(formData.entries());

            try {
                const response = await axios.post('https://jsonplaceholder.typicode.com/posts', data);

                if (response.status === 201) {
                    alert(`Post successful: ${response.data.id}`);
                } else {
                    alert('Post failed');
                }
            } catch (error) {
                alert('Error occurred');
            }
        });
        */