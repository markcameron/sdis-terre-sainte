{
    type: 'bar',
        data: {
        labels: ['Bogis-Bossey', 'Chavannes-des-Bois', 'Chavannes-de-Bogis', 'Commugny', 'Coppet', 'Founex', 'Mies', 'Tannay', 'Eysins'],
            datasets: [{
                label: "Nombre d'interventions",
                data: [10, 12, 6, 13, 12, 13, 7, 8, 1],
                backgroundColor: '#059bff',
            }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
            },
            title: {
                display: true,
                text: "Nombre d'interventions par commune"
            }
        }
    }
}
