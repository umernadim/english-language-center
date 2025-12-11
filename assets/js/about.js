// Data for Core values section
function coreValuesHandler() {
    const cardsData = [
  {
    title: "Excellence in Education",
    descp:
      " We work with our student ‘round the clock to make sure they realize their full potential.",
    imgPath: "assets/images/gallery/img15.jpg",
  },
  {
    title: "Student-Centered Learning",
    descp:
      "Each student has a different pace and we make sure they work on their own timing utilizing their talents and strengths.",
    imgPath: "assets/images/gallery/img14.jpg",
  },
  {
    title: "Continuous Improvement",
    descp:
      "Times are constantly evolving and so are our students which motivates us to constantly develop our teaching methods.",
    imgPath: "assets/images/gallery/img13.jpg",
  },
  {
    title: "Cultural Connection",
    descp:
      "We believe that learning a language means connecting with cultures and people from around the world.",
    imgPath: "assets/images/gallery/img12.jpg",
  },
];

const valuesContainer = document.querySelector(".values-container");
cardsData.forEach((card) => {
  valuesContainer.innerHTML += `
             <div class="value-card">
            <img
              src=${card.imgPath}
              alt="students' group photo"
            />
            <h3>${card.title}</h3>
            <p>
              <i class="ri-double-quotes-l quotes"></i> 
                ${card.descp}
              <i class="ri-double-quotes-r quotes"></i>
            </p>
          </div>
    `;
});

}

coreValuesHandler();

